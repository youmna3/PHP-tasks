<?php
include('./dal/dal.php');
function getCategories()
{
    return getRows("SELECT * FROM categories");

}