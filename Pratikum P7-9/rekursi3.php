<?php
function backpropagation($layers, $target, $depth = 0) {
    if ($depth >= count($layers)) {
        return 0;
    }
    $error = $target - $layers[$depth];
    echo "Layer $depth, Error: $error\n";
    return backpropagation($layers, $target, $depth + 1);
}

$layers = [0.2, 0.5, 0.7];
$target = 1.0;
backpropagation($layers, $target);