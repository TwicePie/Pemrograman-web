<?php

function cetakDeret($n) {

    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "PemrogramanWebsite 2024";
        }
        else if ($i % 5 == 0) {
            echo "2024";
        }
        else if ($i % 4 == 0 && $i % 6 != 0) {
            echo "Pemrograman";
        }
        else if ($i % 6 == 0 && $i % 4 != 0) {
            echo "Website";
        }
        else if ($i % 3 == 0){
            echo "Raulsss";
        }
        else{
            echo $i;
        }
        echo "<br>";
    }
}

$input = 24;
cetakDeret($input);
