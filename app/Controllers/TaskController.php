<?php

namespace App\Controllers;

use Framework\Response;

class TaskController
{
    public function index(): Response
    {
        return new Response("Indexing all tasks");
    }

    public function create(): Response
    {
        return new Response("Create new task");
    }
}