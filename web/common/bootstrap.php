<?php
    // Loads config and necessary stuff
    require 'config.php';
    $basispad = BASE_URL;
    require ABSPATH . '/vendor/autoload.php';
    define('IMAGE_FOLDER', ABSPATH . "/uploads/images");
    define('THUMB_FOLDER', ABSPATH . "/uploads/thumbs");
    DB::$user = DB_USER;
    DB::$password = DB_PASS;
    DB::$dbName = DB_DB;
    require 'formfunctions.php';
    require 'uploadfunctions.php';
    require 'session.php';

    $session = new Session();