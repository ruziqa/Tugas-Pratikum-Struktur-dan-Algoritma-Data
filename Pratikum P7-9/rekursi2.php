<?php
function scanDirectory($dir) {
    $result = [];
    foreach (scandir($dir) as $file) {
        if ($file === '.' || $file === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            $result = array_merge($result, scanDirectory($path));
        } else {
            $result[] = $path;
        }
    }
    return $result;
}

print_r(scanDirectory('/var/bigdata/input'));