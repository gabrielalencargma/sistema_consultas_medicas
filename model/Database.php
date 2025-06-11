<?php

class Database
{
    public static function conectar()
    {
        return new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
    }
}