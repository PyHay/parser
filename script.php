<?php

$views = 0;
$traffic = 0;
$urls = [];
$status_code = [];
$browsers = ["Googlebot" => 0, "Bing" => 0, "Baidu" => 0, "Yandex" => 0];
$lines = array();

foreach (file($argv[1]) as $line) {
    $views++;
    $parts = explode(' ', $line);
    $status = $parts[8];
    $url = $parts[6];

    if (!in_array($url, $urls)) {
        $urls[] = $url;
    }

    if ($status == 200) {
        $traffic = $traffic + $parts[9];
    }

    $request = ltrim($parts[5], '\"');
    $position = strpos($parts[16], "/");
    $browser = substr($parts[16], 0, $position);

    if (array_key_exists($browser, $browsers)) {
        $browsers[$browser]++;
    }

    if (array_key_exists($status, $status_code)) {
        $status_code[$status]++;
    } else {
        $status_code += [$status => 1];
    }

}

$data = ['views' => $views, 'traffic' => $traffic, 'urls' => count($urls), 'crawlers' => $browsers, 'statusCode' => $status_code];
$data = json_encode($data);

print_r(json_decode($data));
