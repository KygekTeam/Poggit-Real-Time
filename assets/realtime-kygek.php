<?php

/*function get_json($json) {
    return json_decode(file_get_contents($json));
}*/

$json = [];
array_push(
    $json,
    get_json('https://poggit.pmmp.io/releases.json?name=KygekJoinUI&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekRulesUI&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekRanksUI&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=KygekPingTPS&fields=downloads'),
    get_json('https://poggit.pmmp.io/releases.json?name=PerWorldPlayersList&fields=downloads')
);

$downloads = 0;

foreach ($json as $jsonc) {
    foreach ($jsonc as $jsoncc) {
        $jsoncc = (array) $jsoncc;
        $downloads += $jsoncc["downloads"];
    }
}

echo "<h1 style=\"font-size: 72px;\">$downloads</h1>";
