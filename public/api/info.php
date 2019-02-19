<?php

include_once dirname(__DIR__).'/../app/InfoController.php';

$info = new InfoController();
echo json_encode($info->show((string) $_GET['id']));
