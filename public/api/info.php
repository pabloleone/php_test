<?php

require dirname(__DIR__).'/../vendor/autoload.php';

header('Content-Type: application/json');

function getInfo($productId)
{
    $baseApiUrl = 'https://www.itccompliance.co.uk/recruitment-webservice/api/';

    $endPoint = 'info';

    $client = new \GuzzleHttp\Client();

    $response = false;

    $data = [];

    while ($response === false) {
        try {
            $response = $client->request('GET', $baseApiUrl.$endPoint, [
                'query' => ['id' => $productId]
            ]);

            if ($response->getStatusCode() === 200) {
                $data = json_decode(strip_tags($response->getBody()), true);

                if (isset($data['error'])) {
                    $response = false;
                    sleep(1);
                }
            }
        } catch (Exception $e) {
            $response = false;
            sleep(1);
        }
    }

    return $data;
}

echo json_encode(getInfo((string) $_GET['id']));
