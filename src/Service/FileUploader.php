<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        $fileExtension = $file->guessExtension();
        $fileName = md5(uniqid()).'.'.$fileExtension;
        $fileSize = $file->getSize();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return ['fileName'=>$fileName, 'fileExtension'=>$fileExtension, 'fileSize'=>$fileSize];
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}