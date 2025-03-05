<?php

class Servicio
{


    public function convert(string $source, string $destination, string $format): string
    {
        return "Se hizo la conversion de ".$source." a ".$destination." con un formato de ".$format;
    }

}