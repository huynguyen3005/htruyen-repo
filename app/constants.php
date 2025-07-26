<?php
function Constants(array $constants)
{
    foreach ($constants as $name => $value) {
        define($name, $value);
    }
}

// define constants here
Constants([
    // App configuration constant
    'APP_NAME' => 'Htruyen',
    'DEFAULT_USER_ROLE' => 'user',
    'MAX_UPLOAD_SIZE' => 5120, // compute by KB
    'DEFAULT_LANGUAGE' => 'en',
    'APP_URL' => 'http://localhost:8000',

    // Other constants
    'LOGO_LINK' => 'assets/media/logo.png'
]);
