<?php 

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

        $index = strpos($alphabet, $karakter) + $key;
        if($index > 25 ) {
            $index = $index - 26 ;
        }

        if( ctype_upper($kalimat[$i])) {
            $kalimatBaru .= strtoupper($alphabet[$index]);
        } else {
            $kalimatBaru .= $alphabet[$index];
        }
    }

    return $kalimatBaru;
}

function input(string $info):string {
    echo" $info :";
    $result = fgets(STDIN);
    return $result;
}

global $awal;
if (!fopen("awal.txt", "r")) {
    echo ('FILE TIDAK ADA' );

    $awal = fopen("awal.txt", "w");
    $textAwal = input("input text");
    fwrite($awal, $textAwal);
    $awal = fopen("awal.txt", "r");
} else {
    $awal = fopen("awal.txt", "r");
}

$text = fread($awal, filesize('awal.txt'));
// $text = fgets($awal);
fclose($awal);
echo ($text);

$akhir = fopen("akhir.txt", "w");
$newText = caesar("$text", 2);
// fwrite($akhir, $newText);
// echo ($newText);
if(fwrite($akhir, $newText)) {
    echo("Text successfully encrypted");
}