<?php

$views = 0;
$traffic = 0;
$urls = [];
$status_code = [];
$browsers = ["Googlebot" => 0, "Bing" => 0, "Baidu" => 0, "Yandex" => 0];
$lines = array();

foreach (file('access.log') as $line) {
    $views++;
    $parts = explode(' ', $line);

        if(!in_array($parts[6], $urls)){
            array_push($urls, $parts[6]);
        }

        if ($parts[8] == 200){
            $traffic = $traffic + $parts[9];
        }
    $request = ltrim($parts[5], '\"');
    $position=strpos($parts[16], "/");
    $browser=substr($parts[16], 0, $position);

        if (array_key_exists($browser, $browsers)){
            $browsers[$browser]++;
        }

        if (array_key_exists($parts[8], $status_code)){
            $status_code[$parts[8]]++;
        }else{
            $status_code += [$parts[8] => 1];
        }
    }
$data = ['views' => $views, 'traffic' => $traffic, 'urls' => count($urls), 'crawlers' => $browsers, 'statusCode' => $status_code];
$data = json_encode($data);
print_r(json_decode($data));
