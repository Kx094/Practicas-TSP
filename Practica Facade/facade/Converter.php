<?php

include("Conversion.php");
include("Servicio.php");

class Converter
{
    private string $output;

    public function testConversion(): void
    {
        $video1 = $_POST['video1'];
        $video2 = $_POST['video2'];
        $formato = $_POST['formato'];

        $converter = new Conversion(new Servicio());

        $output = $converter->convert($video1, $video2, $formato);

        header("location: ../?page=conversor&output=".$output);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Converter = new Converter();
    $Converter->testConversion();
}