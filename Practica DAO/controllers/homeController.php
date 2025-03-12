<?php

function render()
{
    $home = getHome();

    include_once("views/home.php");
}

function getHome()
{

    $home = "<a href='?page=about'>About</a>
            <a href='?page=contact'>Contact</a>";
    return $home;
}
