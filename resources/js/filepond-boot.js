import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImageTransform from 'filepond-plugin-image-transform';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';
import heic2any from "heic2any";

// Expose on window so Blade can use them
window.FilePond = FilePond;
window.FilePondPlugins = {
    ImagePreview: FilePondPluginImagePreview,
    FileValidateType: FilePondPluginFileValidateType,
    ImageTransform: FilePondPluginImageTransform,
    ImageCrop: FilePondPluginImageCrop,
    ImageResize: FilePondPluginImageResize,
    ImageValidateSize: FilePondPluginImageValidateSize,
};
window.heic2any = heic2any;

// Mark libs ready + fire a DOM event (works even if listener is added later)
window.filepondLibsReady = true;
window.dispatchEvent(new Event('filepond:libs-ready'));
