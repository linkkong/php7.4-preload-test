<?php
$hosts = [
    'http://localhost:8000',
    'http://localhost:8001',
    'http://localhost:8002',
];
$path = '/dog.php';
$path = '/laravel/public/index.php';
foreach ($hosts as $host) {
    $out = curl($host . $path);
    echo $out . PHP_EOL;
}

function curl($url)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}



