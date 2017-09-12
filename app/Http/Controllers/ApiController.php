<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\ApiResponser;

class ApiController extends Controller
{
    use ApiResponser;
}