<?php
$variables = [
    'APP_KEY' => '12324oi234352542ooinnosf32SDFsdf23',
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '123',
    'DB_NAME' => 'schoolDB',
    'DB_PORT' => '3306',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}
?>