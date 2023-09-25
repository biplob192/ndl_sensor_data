<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ThingspeakRepositoryInterface;

class ThingspeakController extends Controller
{
    public function __construct(private ThingspeakRepositoryInterface $thingspeakRepository)
    {
    }

    public function index()
    {
        return $this->thingspeakRepository->index();
    }

    public function getData(Request $request)
    {
        return $this->thingspeakRepository->getData($request);
    }
}
