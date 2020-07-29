<?php
namespace service;

include "../../autoload.php";

session_start();
class DB
{
   public static function execute($query){


       $link = mysqli_connect(env('DB_HOST'),
           env('DB_USERNAME'),
           env('DB_PASSWORD'),
           env('DB_NAME'),
           env('DB_PORT'));

       $result = mysqli_query($link, $query);

       return mysqli_fetch_array($result);
   }
}