<?php
require_once(BASE_PATH . 'dal/dal.php');
function getSizes()
{
    return getRows("SELECT * FROM sizes");
}