<?php
$root = realpath(__DIR__ . '/..'); // public'in bir üstü -> proje kökü

function listDir($dir, $level = 0) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === "." || $item === "..") continue;
        echo str_repeat("  ", $level) . "|-- " . $item . "\n";
        if (is_dir($dir . "/" . $item)) {
            listDir($dir . "/" . $item, $level + 1);
        }
    }
}

header("Content-Type: text/plain");
listDir($root);
