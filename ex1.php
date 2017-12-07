<?php
/******************************************************************
 クレジットカード番号は16桁の番号で表すことができますが、
 この番号は以下の性質を持っています。

 一番右の桁を1桁目として、
 ・偶数桁の数字をそれぞれ2倍し総和をとったものをeven
 （ただし、2倍したあと2桁の数字になるものは、1の位と10の位の数を足して1桁の数字にしたあと、総和をとる）
 ・奇数桁の数字の総和をとったものをodd
 とすると、even + odd は10 で必ず割り切れます。

 X を求めてください
 ******************************************************************/

define("CARD_NUMBER_LENGTH", 16);
$inputTotalCards = trim(fgets(STDIN));
$lists = [];

for ($i = 0; $i < $inputTotalCards; $i++) {
    $inputCard[$i] = trim(fgets(STDIN));
    $card = str_split($inputCard[$i]);
    if (count($card) == CARD_NUMBER_LENGTH) {
        $lists[] = getNumber($card);
    }
    else {
        $lists[] = "X";
    }
}
foreach ($lists as $l) {
    echo $l . "\n";
}

/**
 * Get number X
 * @param $card
 * @return int
 */
function getNumber($card) {
    $total = 0;
    for ($j = 0; $j < CARD_NUMBER_LENGTH; $j++) {
        if ($j % 2 == 0) {
            $card[$j] = intval($card[$j]) * 2;
            if (strlen($card[$j]) == 2) {
                $oddSplit = str_split($card[$j]);
                $card[$j] = $oddSplit[0] + $oddSplit[1];
            }
        }
        $total += $card[$j];
    }
    $remainder = $total % 10;
    return $remainder == 0 ? 0 : 10 - $remainder;
}