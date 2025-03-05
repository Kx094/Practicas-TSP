<?php

include("Archivo.php");

readonly class Conversion
{
    public function __construct(
        private Servicio $servicio,
    ) {}

    public function convert(string $source, string $destination, string $format): string
    {
        $file = new Archivo($source);

        return $this->servicio->convert($file->getFilePath(), $destination, $format);
    }
}