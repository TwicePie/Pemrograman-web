<?php
$size = 5; // Tinggi segitiga

for ($i = 1; $i <= $size; $i++) {
    // Cetak spasi
    for ($j = $i; $j < $size; $j++) {
        echo "&nbsp;&nbsp;";
    }
    // Cetak bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "<br>";
}
?>
