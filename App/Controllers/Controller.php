<?php

namespace App\Controllers;

use System\Library\Exceptions\LoaderException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Controller
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(ROOT_DIR . DS .config('filesystem.views_path'));

        $twig = new \Twig\Environment($loader, [
            'cache' => config('filesystem.views_cache') ? ROOT_DIR . DS .config('filesystem.views_cache_path') : false
        ]);

        $this->twig = $twig;
    }

    public function view($file, $data = false)
    {
        try {
            return $this->twig->render($file . '.twig', $data ?: []);
        } catch (LoaderError $e) {
            throw new LoaderException($e->getMessage());
        } catch (RuntimeError $e) {
            throw new LoaderException($e->getMessage());
        } catch (SyntaxError $e) {
            throw new LoaderException($e->getMessage());
        }
    }
}