<?php

function render()
{
    $contact = getContact();

    include_once("views/contact.php");
}

function getContact()
{

    $contact = "<a href='?page=home'>Home</a>
            <a href='?page=about'>About</a>";

    return $contact;
}
