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
    return $downloads;
}
?>
document.getElementById('poggit').innerHTML = <?php echo getAllDownloads(); ?>;
document.getElementById('kygekraqmak').innerHTML = <?php echo getKygekDownloads(); ?>;
