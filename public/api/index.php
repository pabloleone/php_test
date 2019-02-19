<?php

require dirname(__DIR__).'/../vendor/autoload.php';

header('Content-Type: application/json');

function getList()
{
    $baseApiUrl = 'https://www.itccompliance.co.uk/recruitment-webservice/api/';

    $endPoint = 'list';

    $client = new \GuzzleHttp\Client();

    $response = false;

    $response = $client->request('GET', $baseApiUrl.$endPoint);

    // while (!$response) {
    // 	try {
    // 		$response = $client->request('GET', $baseApiUrl);
    // 		var_dump($response);die;
    // 	} catch (Exception $e) {
    // 		$response = false;
    // 		sleep(1);
    // 	}
    // }

    $data = [];

    if ($response->getStatusCode() === 200) {
        $data = $response->getBody();
    }

    return $data;
}

function getInfo($id)
{
    $baseApiUrl = 'https://www.itccompliance.co.uk/recruitment-webservice/api/';

    $endPoint = 'info';

    $client = new \GuzzleHttp\Client();

    $response = false;

    $response = $client->request('GET', $baseApiUrl.$endPoint, [
        'query' => ['id' => $id]
    ]);

    // while (!$response) {
    //  try {
    //      $response = $client->request('GET', $baseApiUrl);
    //      var_dump($response);die;
    //  } catch (Exception $e) {
    //      $response = false;
    //      sleep(1);
    //  }
    // }

    $data = [];

    if ($response->getStatusCode() === 200) {
        $data = $response->getBody();
    }

    return $data;
}

echo getInfo($_GET['id']);
// echo getList();
