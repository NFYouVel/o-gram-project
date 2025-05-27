<?php

$checkHarm = "../../TextFile/harmWord.txt";
$file = fopen($checkHarm,"r");

if (!$file) {
    die("Gagal membuka file.");
}

$booleanHarm = false;

while (($line = fgets($file)) != false) {
    echo $line; 
    if (strcasecmp($name, trim($line)) == 0) {
        echo "kata kasar woi";
    }
}

fclose($file);
?>