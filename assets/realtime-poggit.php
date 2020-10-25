<?php

function get_json($json) {
    return json_decode(file_get_contents($json));
}

$json = [];
array_push(
    $json,
    get_json('https://poggit.pmmp.io/releases.json?fields=downloads')
);

$downloads = 0;

foreach ($json as $jsonc) {
    foreach ($jsonc as $jsoncc) {
        $jsoncc = (array) $jsoncc;
        $downloads += $jsoncc["downloads"];
    }
}

echo "<h1 style=\"font-size: 72px;\">$downloads</h1>";
