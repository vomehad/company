<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[
    OA\Info(version: '1.0.0', title: 'EdgeQ API',),
    OA\Server(url: "http://localhost/api"),
]
class ApiController extends Controller
{

}
