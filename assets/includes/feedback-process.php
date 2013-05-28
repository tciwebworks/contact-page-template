<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include dirname(dirname(__FILE__)).'/config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
    include 'functions.php';

    $name = stripslashes($_POST['name']);
    $opinion = stripslashes($_POST['opinion']);

    $error = '';

    // Check name

    if(!$name) {
        $error .= 'Please enter your name.<br />';
    }

    // Check message (length)
    if(!$opinion || strlen($opinion) < 15) {
        $error .= "Please share with us your opinion. It should have at least 15 characters.<br />";
    }


    if(!$error) {
        $mail = mail(WEBMASTER_EMAIL, 'Feedback', $opinion,
            "X-Mailer: PHP/" . phpversion());
        
        if($mail)
        {
            echo 'OK';
        }
    } else {
        echo '<div class="notification_error">'.$error.'</div>';
    }
}
?>