<?php

use Livewire\Volt\Component;

new class extends Component {
    public int $userId;
    public int $uploadedImagesCount;
    public int $canUploadImagesCount = 0;

    public function mount()
    {
        $this->canUploadImagesCount = config('filesystems.max_files') - $this->uploadedImagesCount;
    }
}; ?>

<div x-data="gallery">
    <div class="bg-white rounded-2xl shadow-xl p-6 space-y-4 max-w-xl">
            <div class="border-b border-gray-300" x-cloak x-show="showUploadButton">
                <div class="mb-3 flex justify-between">
                    <div class="flex items-center space-x-2.5">
                        <p class="text-sm text-orange-600">
                            {{ __('filepond.photos_not_uploaded') }}
                        </p>
                    </div>
                    <div x-ref="uploadPhotosButton">
                        <flux:button class="cursor-pointer" variant="primary" @click.prevent="startUpload()"
                                     color="lime">{{ __('filepond.save_images') }}</flux:button>
                    </div>
                </div>
            </div>

            <div wire:ignore>
                <span id="spinner"
                      x-show="!galleryInitialized || isUploading"
                      class="ml-1 inline-block">
                    <svg class="animate-spin h-4 w-4 text-blue-500"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
                <input
                    name="photo[]"
                    type="file"
                    x-ref="upload"
                    multiple
                    accept="image/png, image/jpeg, image/jpg, image/webp, image/avif, image/heic"
                    class="hover:cursor-pointer"
                >
            </div>
    </div>

    @push('styles')
        <link href="{{ asset('css/filepond/filepond.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/filepond/filepond-plugin-image-preview.min.css') }}" rel="stylesheet" />

        <style>
            .filepond--item > .filepond--file-wrapper,
            .filepond--image-preview-wrapper,
            .filepond--item {
                max-width: 200px;
            }

            .filepond--file-wrapper {
                margin: 10px;
            }

            .filepond--root {
                margin-bottom: 0;
            }
        </style>
    @endpush

    @pushOnce('scripts')
        <script>
            (() => {
                document.addEventListener('alpine:init', () => {
                    Alpine.data("gallery", () => ({
                        showUploadButton: false,
                        pond: null,
                        galleryInitialized: false,
                        isUploading: false,
                        hasQueued: false,
                        hasAny: false,
                        user_id: {{ $userId }},

                        init() {
                            const go = () => requestAnimationFrame(() => this.bootPond());
                            if (window.filepondLibsReady && window.FilePond && window.FilePondPlugins) go();
                            else window.addEventListener('filepond:libs-ready', go, { once: true });
                        },

                        bootPond() {
                            if (this.pond) return; // guard
                            if (!window.FilePond || !window.FilePondPlugins) return;

                            const P = window.FilePondPlugins;
                            window.FilePond.registerPlugin(
                                P.ImagePreview,
                                P.FileValidateType,
                                P.ImageTransform,
                                P.ImageCrop,
                                P.ImageResize,
                                P.ImageValidateSize,
                            );

                            const detectType = (source, type) => {
                                // source can be a File or a Blob (or a string when using remote)
                                // Return a Promise that resolves the detected mime
                                return new Promise((resolve) => {
                                    // Example: if the filename ends with .heic, force image/heic
                                    if (source && source.name && /\.heic$/i.test(source.name)) {
                                        resolve('image/heic');
                                    } else {
                                        resolve(type);
                                    }
                                });
                            };

                            // Create pond
                            this.pond = window.FilePond.create(this.$refs.upload, {
                                acceptedFileTypes: ["image/jpg","image/jpeg","image/png","image/webp","image/avif","image/heic"],
                                allowMultiple: true,
                                imageTransformOutputMimeType: "image/jpeg",
                                imageTransformOutputQuality: {{ config('filesystems.quality') }},
                                labelIdle: {!! json_encode(__('filepond.idle')) !!},
                                labelFileProcessing: {!! json_encode(__('filepond.file_processing')) !!},
                                labelFileProcessingComplete: {!! json_encode(__('filepond.file_processing_complete')) !!},
                                labelMaxFileSizeExceeded: {!! json_encode(__('filepond.max_file_size_exceeded')) !!},
                                labelMaxFileSize: {!! json_encode(__('filepond.max_file_size')) !!},
                                instantUpload: false,
                                allowProcess: false,
                                credits: false,
                                dropValidation: false,
                                dropOnPage: false,
                                allowImageTransform: false,
                                allowFileEncode: true,
                                allowImagePreview: true,
                                allowImageCrop: true,
                                imageCropAspectRatio: "1:1",
                                imageResizeTargetWidth: 1024,
                                maxFileSize: "100MB",
                                maxFiles: {{ $canUploadImagesCount }},
                                imagePreviewMaxHeight: 200,
                                imagePreviewMaxWidth: 200,
                                fileValidateTypeDetectType: detectType,

                                server: {
                                    process: (fieldName, file, metadata, load, error, progress, abort) => {
                                        const processFile = (fileToProcess) => {
                                            const formData = new FormData();
                                            formData.append("photo", fileToProcess, fileToProcess.name);
                                            formData.append("user_id", this.user_id);

                                            const request = new XMLHttpRequest();
                                            request.open("POST", '{{ route('photos.upload') }}');
                                            request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');

                                            request.upload.onprogress = (e) => {
                                                progress(e.lengthComputable, e.loaded, e.total);
                                            };

                                            request.onload = function () {
                                                if (request.status >= 200 && request.status < 300) {
                                                    load(request.responseText);
                                                } else {
                                                    error("Upload failed: " + request.responseText);
                                                }
                                            };

                                            request.onerror = function () {
                                                console.error("Network error");
                                                error("Network error");
                                            };

                                            request.send(formData);
                                        };

                                        if (file.name.toLowerCase().indexOf('.heic') !== -1) {
                                            console.log("Converting HEIC to JPEG...");
                                            heic2any({
                                                blob: file,
                                                toType: "image/jpeg",
                                                quality: {{ config('filesystems.compression') }},
                                            }).then((convertedBlob) => {
                                                const newFileName = file.name.replace(/\.heic$/i, ".jpg");
                                                const convertedFile = new File([convertedBlob], newFileName, { type: "image/jpeg" });
                                                processFile(convertedFile);
                                            }).catch((error) => {
                                                console.error("HEIC conversion failed:", error);
                                                error("HEIC conversion failed");
                                            });
                                        } else {
                                            processFile(file);
                                        }

                                        return { abort() {} };
                                    },

                                    revert: null,
                                },

                                onprocessfiles: () => {
                                    console.log("All files processed.");
                                    this.isUploading = false;
                                    this.showUploadButton = true;
                                    this.isLoading = false;
                                    this.pond.removeFiles();
                                    this.$dispatch('photos-uploaded', { userId: this.user_id });
                                },
                            })

                            // Flags
                            const updateFlags = () => {
                                const files = this.pond.getFiles();
                                this.hasAny = files.length > 0;
                                this.isUploading = files.some(f =>
                                    f.status === FilePond.FileStatus.PROCESSING ||
                                    f.status === FilePond.FileStatus.PROCESSING_QUEUED
                                );
                                this.hasQueued = files.some(f =>
                                    f.status === FilePond.FileStatus.IDLE ||
                                    f.status === FilePond.FileStatus.INIT ||
                                    f.status === FilePond.FileStatus.PROCESSING_QUEUED
                                );
                                this.showUploadButton = this.hasQueued && !this.isUploading;
                            };

                        [
                            'addfile','addfilestart','removefile','processfilestart','processfileprogress',
                            'processfile','processfiles','processfileabort','processfileundo','error','reorderfiles',
                        ].forEach(evt => this.pond.on(evt, updateFlags));

                        updateFlags();
                        this.galleryInitialized = true;
                    },

                    startUpload() {
                        if (!this.pond) return;
                        console.log("Starting upload of files...");
                        this.pond.processFiles();
                        this.isLoading = true;
                    },

                    resetAll() {
                        if (!this.pond) return;
                        this.pond.removeFiles();
                    },
                }));
            });
            })();
        </script>
    @endPushOnce
</div>
