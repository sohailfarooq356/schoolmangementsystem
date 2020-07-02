<?php


/**
 * Trait Messages
 * Messages to show on different conditions
 */
trait Messages
{
    public function success()
    {
        echo 'Success <a href="./">Back to Home</a>';
    }

    public function error()
    {
        echo 'Error <a href="./">Back to Home</a>';
    }
}