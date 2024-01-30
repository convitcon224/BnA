<?php

namespace App\Controllers;

class TestBnA extends BaseController
{
    public function index($product)
    {
        echo 'Product '.$product;
    }
}
