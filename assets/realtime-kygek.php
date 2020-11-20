<?php

$json = [];
array_push(
    $json,
    get_json('https://poggit.pmmp.io/releases.json?name=KygekJoinUI&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekRulesUI&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekRanksUI&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekPingTPS&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekWhitelistKick&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=PerWorldPlayersList&fields=downloads')
);

$downloads = 0;

foreach ($json as $jsonc) {
    foreach ($jsonc as $jsoncc) {
        $jsoncc = (array) $jsoncc;
        $downloads += $jsoncc["downloads"];
    }
}

// KygekRulesUI version 1.1.0 downloads
// Should be added because it's Kygekraqmak's plugin and the version is currently unavailable
$downloads += 957;

echo "<h1 style=\"font-size: 72px;\">$downloads</h1>";
