<?php
/******************************************************************
 ある時刻(0時～23時)が、指定した時間の範囲内に含まれるかどうかを調べる
 プログラムを作ってください。
 言語は問いませんが、ライブラリなどを使ってはいけません。

 以下のような条件を満たすこと。
 - ある時刻と、時間の範囲(開始時刻と終了時刻)を受け取る。
 - 時刻は、6時であれば6のような指定でよく、分単位は問わない。
 - 範囲指定は、開始時刻を含み、終了時刻は含まないと判断すること。
 - ただし開始時刻と終了時刻が同じ場合は含むと判断すること。
 - 開始時刻が22時で終了時刻が5時、というような指定をされても動作すること。
 ******************************************************************/

echo "Input start time(0~23): ";
$beginTime = trim(fgets(STDIN));
echo "Input end time(0~23): ";
$endTime = trim(fgets(STDIN));
echo "Input time(0~23) to check: ";
$checkTime = trim(fgets(STDIN));

if (searchTimeRange($beginTime, $endTime, $checkTime)) {
    printf("%d:00 is included from %d:00 to %d:00\n", $checkTime, $beginTime, $endTime);
} else {
    printf("%d:00 is not included from %d:00 to %d:00\n", $checkTime, $beginTime, $endTime);
}

/**
 * Search Time In Range
 * @param $begin
 * @param $end
 * @param $time
 * @return bool
 */
function searchTimeRange($begin, $end, $time)
{
    if ($begin < $end) { //When in a day
        if ($begin <= $time && $time <= $end) {
            return true;
        }
    } else if ($begin == $end) { //when begin time equal end time
        return true;
    } else { //When on different days
        if ($begin <= $time || $time <= $end) {
            return true;
        }
    }
    return false;
}