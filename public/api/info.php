<?php

include_once 'request.php';

class InfoController extends Request
{
    /**
     * Show product extra information.
     * @param  string $id
     * @return array
     */
    public function show(string $id) : array
    {
        $endPoint = 'info';

        $response = false;

        $data = [];

        while ($response === false) {
            try {
                $response = $this->client->request('GET', $this->baseApiUrl.$endPoint, [
                    'query' => ['id' => $id]
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
}

$info = new InfoController();
echo json_encode($info->show((string) $_GET['id']));
