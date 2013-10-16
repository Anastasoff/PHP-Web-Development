<?php

session_start();

$config = array(
    'DB_HOST' => 'localhost',
    'DB_USER' => 'myuser',
    'DB_PASSWORD' => 'qwerty',
    'DB_NAME' => 'books'
);

$connection = mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);

mysqli_set_charset($connection, 'utf8');
if (!$connection) {
    echo 'Няма връзка със база данни!';
    exit;
}