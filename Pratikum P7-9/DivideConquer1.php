
<?php
function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }
    $mid = count($arr) / 2;
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));
    return merge($left, $right);
}

function merge($left, $right) {
    $res = [];
    while (count($left) && count($right)) {
        $res[] = ($left[0] < $right[0]) ? array_shift($left) : array_shift($right);
    }
    return array_merge($res, $left, $right);
}

$data = [34, 7, 23, 32, 5, 62];
print_r(mergeSort($data));
