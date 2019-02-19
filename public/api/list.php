<?php

include_once dirname(__DIR__).'/../app/ListController.php';

$list = new ListController();
echo json_encode($list->index());
