<?php
$filename = "password.txt";
$fp = fopen($filename, "r") or die("Error: Couldn't open {$filename}");
$lines = fread($fp, filesize($filename));
fclose($fp);

$lines = explode("\n", $lines);
$arr = array(5, -14, 31, -9, 3);
$passwords = array();

foreach ($lines as $password) {
    $pass = "";
    $current_index = 0;
    for ($i = 0; $i < strlen($password); $i++) {
        $char = ord($password[$i]);
        $char -= $arr[$current_index];
        $current_index++;

        $char = chr($char);
        $pass .= $char;

        if ($current_index == 5) {
            $current_index = 0;
        }
    }

    $curr = explode("*", $pass);
    if (count($curr) == 2) {
        $passwords[$curr[0]] = $curr[1];
    } else {
    }
}


/* ezzel kiiratom a div alá a dekodolt jelszavakat amivel lathato lesz
foreach ($passwords as $username => $password) {
    echo "Felhasználónév: $username, Jelszó: $password <br>";
}
*/
