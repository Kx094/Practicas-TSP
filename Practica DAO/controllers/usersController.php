<?php

function render()
{
    $view = getUser();

    include_once("views/users.php");
}

function getUser()
{

    $user = "<h1>Registrar usuario</h1>
    <form method='POST'>
        <label>
            Nombre:
            <input type='text' name='name' required>
        </label>
        
        <label>
            Email:
            <input type='email' name='email' required>
        </label>
        
        <button type='submit'>Registrar usuario</button>
    </form>";
    return $user;
}
