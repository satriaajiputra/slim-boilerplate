<?php

namespace App\Controllers;

use App\Models\Setting;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
    public function home(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'layouts/home.php', [
            
        ]);
    }
}
