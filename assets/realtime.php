<?php

ini_set("default_socket_timeout", 2);

function getDownloads(bool $kygekteam = false){
    $poggitIsDown = false;
    set_error_handler(function () use (&$poggitIsDown) {
        $poggitIsDown = true;
    });

    $json = json_decode(file_get_contents("https://poggit.pmmp.io/plugins.min.json?fields=downloads,name,id"), true);
    restore_error_handler();

    if ($poggitIsDown || !is_array($json)) return "Poggit is Down!";

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
            "KygekLastPosition"
        ])) return false;

        return true;
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

document.getElementById('poggit').innerHTML = "<?php echo getDownloads(); ?>";
document.getElementById('kygekraqmak').innerHTML = "<?php echo getDownloads(true); ?>";
