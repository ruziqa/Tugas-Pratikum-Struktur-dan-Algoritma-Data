<?php
function processPartition($data, $depth = 0) {
    if (count($data) <= 1) return $data;

    echo "Processing part at depth $depth: " . json_encode($data) . "\n";

    $mid = intval(count($data) / 2);
    $left = processPartition(array_slice($data, 0, $mid), $depth + 1);
    $right = processPartition(array_slice($data, $mid), $depth + 1);

    return array_merge($left, $right);
}

$data = range(1, 16);
processPartition($data);