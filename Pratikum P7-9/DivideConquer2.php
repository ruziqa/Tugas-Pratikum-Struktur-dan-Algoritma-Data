<?php
function divideImage($imageMatrix) {
    $size = count($imageMatrix);
    if ($size <= 1) return [$imageMatrix];

    $mid = intval($size / 2);
    return array_merge(
        divideImage(array_slice($imageMatrix, 0, $mid)),
        divideImage(array_slice($imageMatrix, $mid))
    );
}

$image = [
    [255, 0, 0], 
    [128, 128, 128], 
    [0, 255, 0], 
    [0, 0, 255]
];

$result = divideImage($image);
print_r($result);