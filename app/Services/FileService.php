<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function upload(
        Model $model,
        UploadedFile $file,
        string $folder,
        bool $isMain = false
    ): void {

        $path = $file->store(
            $this->getFolder($model, $folder),
            'public'
        );

        $model->files()->create([
            'path' => $path,
            'name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'is_main' => $isMain,
        ]);
    }

    public function uploadMany(
        Model $model,
        array $files,
        string $folder,
        ?int $mainIndex = null
    ): void {

        $pathFolder = $this->getFolder(
            $model,
            $folder
        );

        foreach ($files as $index => $file) {

            $path = $file->store(
                $pathFolder,
                'public'
            );

            $model->files()->create([
                'path' => $path,
                'name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'is_main' => $mainIndex !== null
                    && $index === $mainIndex,
            ]);
        }
    }

    public function replace(
        Model $model,
        UploadedFile $file,
        string $folder,
        bool $isMain = false
    ): void {

        $this->deleteByFolder(
            model: $model,
            folder: $folder
        );

        $this->upload(
            model: $model,
            file: $file,
            folder: $folder,
            isMain: $isMain
        );
    }

    public function replaceMany(
        Model $model,
        array $files,
        string $folder,
        ?int $mainIndex = null
    ): void {

        $this->deleteByFolder(
            model: $model,
            folder: $folder
        );

        $this->uploadMany(
            model: $model,
            files: $files,
            folder: $folder,
            mainIndex: $mainIndex
        );
    }

    public function deleteByFolder(
        Model $model,
        string $folder
    ): void {

        $files = $model->files()
            ->where('path', 'like', "%/{$folder}/%")
            ->get();

        foreach ($files as $file) {

            Storage::disk('public')
                ->delete($file->path);

            $file->delete();
        }
    }

    public function deleteModelFiles(
        Model $model
    ): void {

        foreach ($model->files as $file) {

            Storage::disk('public')
                ->delete($file->path);

            $file->delete();
        }

        Storage::disk('public')
            ->deleteDirectory(
                strtolower(class_basename($model))
                . '/'
                . $model->id
            );
    }

    private function getFolder(
        Model $model,
        string $folder
    ): string {

        return strtolower(
                class_basename($model)
            )
            . '/'
            . $model->id
            . '/'
            . $folder;
    }
}
