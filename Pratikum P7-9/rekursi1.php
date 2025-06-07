<?php
function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

echo "Fibonacci ke-10: " . fibonacci(10) . "\n";