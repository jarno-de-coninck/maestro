<?php

namespace App\Controllers;


use Framework\Response;

class HomeController
{
    public function index(): Response
    {
        return new Response("This should be the index");
    }

    public function about(): Response
    {
        return new Response("About page");
    }
}