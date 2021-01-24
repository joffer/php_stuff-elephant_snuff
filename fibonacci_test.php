<?php
declare(strict_types=1);

// Include router class
include('Route.php');

// Add base route (startpage)
Route::add('/', function () {
    echo 'Welcome :-)';
    echo "<br/>" . get_fibo_row(5);
});

// Simple test route that simulates static html file
Route::add('/test.html', function () {
    echo 'Hello from test.html';
});

// Post route example
Route::add('/contact-form', function () {
    echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
}, 'get');

// Post route example
Route::add('/contact-form', function () {
    echo 'Hey! The form has been sent:<br/>';
    print_r($_POST);
}, 'post');

// Accept only numbers as parameter. Other characters will result in a 404 error
Route::add('/foo/([0-9]*)/bar', function ($var1) {
    echo $var1.' is a great number!';
});

Route::run('/');

function get_fibo_row(int $number) : string {

    if ($number == 0){
        return '0';
    } else if ($number == 1){
        return '0 1';
    }

    $first = 0;
    $second = 1;
    $result = [];

    if ($number){
        $number -= 2;

        for ($i = 0; $i <= $number; $i++){
            $result[] = $first + $second;
            $first = $second;
            $second = end($result);
        }
        $result = '0 1 ' . implode(' ', $result);
        return $result;
    } else {
        return 'not a valid number, need integer value';
    }
}