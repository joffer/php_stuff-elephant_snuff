<?php

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