<?php

include_once 'request.php';

class ListController extends Request
{
    /**
     * List all products.
     * @return array
     */
    public function index() : array
    {
        $endPoint = 'list';

        $response = false;

        $data = [];

        while ($response === false) {
            try {
                $response = $this->client->request('GET', $this->baseApiUrl.$endPoint);

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

$list = new ListController();
echo json_encode($list->index());
