<?php

use MyApp\Controller\UserController;

if(UserController::isLoggedIn())
{
?>
    <ul>
        <li><a href='/'>Home</a></li>
        <li><a href="/logout">Log Out</a></li>
        <li><a href="/upload">Upload</a></li>
    </ul>
<?php
    return;
}
?>
<ul>
    <li><a href='/'>Home</a></li>
    <li><a href="/login">Log In</a></li>
    <li><a href="/register">Register</a></li>
</ul>


