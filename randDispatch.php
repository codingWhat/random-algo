<?php
testCase();
function testCase() {
    $taskSum = 1000;
    $taskRatios = [
        "A" => 2,
        "C" => 1,
        "B" => 5,
    ];
    $startTime = microtime(true);
    randomDispatchTask($taskSum, $taskRatios);
    echo "运行时间:" . round((microtime(true) - $startTime) * 1000,2) . "ms" . PHP_EOL;


    $taskSum = 10000;
    $taskRatios = [
        "A" => 2,
        "C" => 1,
        "B" => 5,
    ];
    $startTime = microtime(true);
    randomDispatchTask($taskSum, $taskRatios);
    echo "运行时间:" . round((microtime(true) - $startTime) * 1000,2) . "ms" . PHP_EOL;




    $taskSum = 10000;
    $taskRatios = [
        "C" => 1,
        "B" => 9,
    ];
    $startTime = microtime(true);
    randomDispatchTask($taskSum, $taskRatios);
    echo "运行时间:" . round((microtime(true) - $startTime) * 1000,2) . "ms" . PHP_EOL;

}

function randomDispatchTask($taskSum, $taskRatios){

    $res = [];
    foreach($taskRatios as $taskName => $ratio) {
        $res [$taskName] = 0;
    }

    $maxRange = array_sum($taskRatios);
    for($i = 0; $i < $taskSum; $i++) {
        $random = mt_rand(0, $maxRange);
        $bk = "";
        $weight = 0;
        foreach($taskRatios as $tbk => $ratio) {
            $weight += $ratio;
            if ($random <= $weight) {
                $bk = $tbk;
                break;
              }
        }
        if (!empty($bk)) {
            $res[$bk]++;
            //todo dispatch the task to downstream..
        }
    }


}
