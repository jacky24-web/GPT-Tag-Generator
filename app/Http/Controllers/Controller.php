<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createEnrichement()
    {
        return view('create-enrichement');
    }

    public function editEnrichement()
    {
        return view('edit-enrichement');
    }

    public function indexEnrichement()
    {
        return view('home');

    }
}
