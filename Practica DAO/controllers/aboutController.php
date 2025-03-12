<?php

function render()
{
    $about = getAbout();

    include_once("views/about.php");
}

function getAbout()
{

    $about = "<a href='?page=home'>Home</a>
            <a href='?page=contact'>Contact</a>";
    return $about;
}
