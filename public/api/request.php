<?php

require dirname(__DIR__).'/../vendor/autoload.php';

class Request
{
    protected $baseApiUrl = 'https://www.itccompliance.co.uk/recruitment-webservice/api/';

    protected $client;

    public function __construct()
    {
        $this->addHeaders();
        $this->client = new \GuzzleHttp\Client();
    }

    private function addHeaders()
    {
        header('Content-Type: application/json');
    }
}
