<?php

namespace System\Core;


use System\Library\LoaderException;

class Import
{
    /**
     * @param $file
     * @return array
     * @throws LoaderException
     */
    public static function config($file): array
    {
        if (! file_exists(ROOT_DIR . DS .  '/Config/' . $file . '.php'))
            throw new LoaderException('Config dosyanız bulunamadı.');

        return require ROOT_DIR . DS . 'Config/' . $file . '.php';
    }
}