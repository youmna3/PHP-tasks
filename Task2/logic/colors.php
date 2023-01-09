<?php
require_once(BASE_PATH . 'dal/dal.php');
function getColors()
{
    return getRows("SELECT * FROM colors");
}