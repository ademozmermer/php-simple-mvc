<?php

namespace App\Controllers;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return string
     * @throws \System\Library\Exceptions\LoaderException
     */
    public function index()
    {
        $data = 'Adem Özmermer';

        return $this->view('index', compact('data'));
    }
}