<?php

function render()
{
    $conversor = getConversor();
    include_once("views/conversor.php");
}

function getConversor()
{

    $conversor = "<form action='facade/Converter.php' method='POST'>
        <label>Video:</label>
        <input type='text' name='video1' required><br><br>
        
        <label>Nuevo video:</label>
        <input type='text' name='video2' required><br><br>

        <label>Formato:</label>
        <input type='text' name='formato' required><br><br>
        
        <input type='submit' value='Submit'>
    </form>";
    return $conversor;
}
