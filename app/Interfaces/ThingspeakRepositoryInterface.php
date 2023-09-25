<?php

namespace App\Interfaces;


interface ThingspeakRepositoryInterface
{
    public function index();
    public function getData($request);
}
