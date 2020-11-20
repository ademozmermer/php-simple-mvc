<?php

namespace System\Core;

/**
 * Class Config
 * Config dosyalarımızın değerlerini getirmek için kullanırız
 *
 * @package System\Core
 */
class Config
{
    /**
     * @param string $params
     * @return array|mixed
     * @throws \System\Library\LoaderException
     */
    public function get(string $params)
    {
        // Explode items
        $keys 	= explode('.', $params);

        // Set config file
        $file 	= $keys[0];

        // Get config file
        $config = Import::config($file);

        // Remove file item from array
        array_shift($keys);

        // Find the item that requested
        foreach($keys as $key) {
            $config = $config[$key];
        }

        // return the item
        return $config;
    }
}