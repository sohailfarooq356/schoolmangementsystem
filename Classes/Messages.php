<?php


/**
 * Trait Messages
 * Messages to show on different conditions
 */
trait Messages
{
    public static function success()
    {
        echo 'Success <a href="./">Back to Home</a>';
    }

    public static function error()
    {
        echo 'Error <a href="./">Back to Home</a>';
    }

    public static function passwordError()
    {
        echo 'Password Mismatch Error <a href="./">Back to Home</a>';
    }
}