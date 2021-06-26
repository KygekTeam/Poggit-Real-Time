<?php

function getDownloads(bool $kygekteam = false){
    $json = json_decode(file_get_contents("https://poggit.pmmp.io/plugins.json?fields=downloads,name"), true);

    $json = array_filter($json, function ($var) use ($kygekteam) : bool {
        if ($kygekteam && !in_array($var["name"], [
            "KygekJoinUI",
            "KygekRulesUI",
            "KygekRanksUI",
            "KygekPingTPS",
            "KygekWhitelistKick",
            "KygekTagsShop",
            "KygekEatHeal",
            "KygekFarmlandDecay",
            "PerWorldPlayersList"
        ])) return false;

        static $downloads = 0;
        static $name = "";
        if ($var["downloads"] !== $downloads || $var["name"] !== $name) {
            $downloads = $var["downloads"];
            $name = $var["name"];
            return true;
        }

        return false;
    });

    $downloads = 0;
    foreach ($json as $jsonc) {
        $downloads += $jsonc["downloads"];
    }

    // KygekRulesUI version 1.1.0 downloads
    // Should be added because it's Kygekraqmak's plugin and the version is currently unavailable
    if ($kygekteam) $downloads += 957;

    return $downloads;
}

?>

document.getElementById('poggit').innerHTML = <?php echo getDownloads(); ?>;
document.getElementById('kygekraqmak').innerHTML = <?php echo getDownloads(true); ?>;
