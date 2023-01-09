<?php

function getRating()
{
    return getRows("SELECT * FROM ratings");

}