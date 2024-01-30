<?php namespace App\Services;

class BaseService
{
    protected $validation;

    function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
}