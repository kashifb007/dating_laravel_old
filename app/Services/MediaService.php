<?php

namespace App\Services;

class MediaService
{
    public function __construct(private $model)
    {
    }

    public function store(): void
    {
        $this->model
            ->addMedia($this->model->realPath, config('filesystems.default'))
            ->setName($this->model->fileName)
            ->toMediaCollection($this->model->collectionName, config('filesystems.default'));
    }

    public function update(): void
    {
        $this->destroy();
        $this->store();
    }

    public function destroy(): void
    {
        if ($this->model->hasMedia($this->model->collectionName)) {
            $this->model->getMedia($this->model->collectionName)[0]->delete(); //only 1 media per model
        }
    }
}
