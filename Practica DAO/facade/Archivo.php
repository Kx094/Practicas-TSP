<?php



readonly class Archivo
{
    public function __construct(
        private string $filePath,
    ) {}

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}