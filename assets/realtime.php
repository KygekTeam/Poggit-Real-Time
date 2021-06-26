<?php
function get_json($json) {
    return json_decode(file_get_contents($json));
}
function getAllDownloads(){
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
    return $downloads;
}
function getKygekDownloads(){
    $json = json_decode(file_get_contents("https://poggit.pmmp.io/plugins.json?fields=downloads,name"), true);

    $json = array_filter($json, function ($var) : bool {
        return in_array($var["name"], [
            "KygekJoinUI",
            "KygekRulesUI",
            "KygekRanksUI",
            "KygekPingTPS",
            "KygekWhitelistKick",
            "KygekTagsShop",
            "KygekEatHeal",
            "KygekFarmlandDecay",
            "PerWorldPlayersList"
        ]);
    });

    $downloads = 0;
    
    foreach ($json as $jsonc) {
        $downloads += $jsonc["downloads"];
    }
    
    // KygekRulesUI version 1.1.0 downloads
    // Should be added because it's Kygekraqmak's plugin and the version is currently unavailable
    $downloads += 957;
    
    return $downloads;
}
?>
document.getElementById('poggit').innerHTML = <?php echo getAllDownloads(); ?>;
document.getElementById('kygekraqmak').innerHTML = <?php echo getKygekDownloads(); ?>;
