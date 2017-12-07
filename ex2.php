<?php
/******************************************************************
 「黒コインで挟まれている1つもしくは連続した白コイン」および
 「白コインで挟まれている1つもしくは連続した黒コイン」を一斉に反転させる。
  反転するコインがなくなるまでこの操作を繰り返す。

  黒コインがいくつあるかを計算する
 ******************************************************************/

$inputBoardXLength = trim(fgets(STDIN));
$inputCoins = trim(fgets(STDIN));
$coinsToArray = str_split($inputCoins);
while ($coinsToArray != playGame($coinsToArray)) {
    $coinsToArray = playGame($coinsToArray);
}
echo count(array_keys($coinsToArray, "b"));

/**
 * Change coin color
 * @param $coins
 * @return array
 */
function playGame($coins)
{
    $length = count($coins);
    $newCoins = [];
    $firstCoin = $coins[0];
    $lastCoin = $coins[$length - 1];
    $newCoins[0] = $firstCoin;

    for ($i = $length - 1; $i >= 0; $i--) {
        if ($lastCoin != $coins[$i]) {
            break;
        }
        $newCoins[$i] = $lastCoin;
    }

    for ($n = 1; $n <= $i; $n++) {
        if ($firstCoin != $coins[$n]) {
            $newCoins[$n] = $firstCoin;
            $firstCoin = $coins[$n];
        } else {
            $newCoins[$n] = $newCoins[$n - 1];
        }
    }
    ksort($newCoins);
    return $newCoins;
}
