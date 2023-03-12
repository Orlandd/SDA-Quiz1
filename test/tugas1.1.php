<?php

// Fungsi sandi caesar
function caesar (string $kalimat,int $key):string {
    $lower = strtolower($kalimat);
    $key = $key % 26;
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $kalimatBaru = "";

    for($i = 0 ; $i < strlen($lower) ; $i++) {
        $karakter = $lower[$i];
        if($karakter == " ") {
            $kalimatBaru .= $karakter;
            continue;
        }

        $index = strpos($alphabet, $karakter) - $key;
        if($index > 25 ) {
            $index = $index - 26 ;
        }
        if($index < 0) {
            $index = $index + 26;
        }

        if( ctype_upper($kalimat[$i])) {
            $kalimatBaru .= strtoupper($alphabet[$index]);
        } else {
            $kalimatBaru .= $alphabet[$index];
        }
    }

    return $kalimatBaru;
}

// fungsi untuk menerima input user 
function input(string $info):string {
    echo" $info :";
    $result = fgets(STDIN);
    return $result;
}


$key =  input("input key berupa angka");
echo (caesar("CdEf", $key));

// $akhir = fopen ("akhir.txt", "r");

// if(!$akhir) {
//     die("FILE TIDAK ADA");
// }

// $text = fread($akhir, filesize('akhir.txt'));
// fclose($akhir);

// $awal = fopen ("awal.txt", "w");
// $newText = caesar("$text", $key);

// if(fwrite($awal, $newText)) {
//     echo("Text successfully encrypted");
// }

// fclose($awal);

