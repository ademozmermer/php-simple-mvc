<?php
use System\Core\Config;
use System\Library\Hashing\Hash;

if (! function_exists('config'))
{
    /**
     * @param $param
     * @return array|mixed
     * @throws \System\Library\LoaderException
     */
    function config($config) {
        $class = new Config();

        return $class->get($config);
    }
}

if (! function_exists('dd'))
{
    /**
     * @param $data
     */
    function dd($data) {
        echo "<pre>";
        var_dump($data);
        exit;
    }
}

if (! function_exists('hash_make'))
{
    /**
     * @param $value
     * @param array $options
     * @return string|null
     * @throws \System\Library\RuntimeException
     */
    function hash_make($value, array $options = []) {
        $hash = new Hash();
        return $hash->make($value, $options);
    }
}

if (! function_exists('hash_check'))
{
    /**
     * @param $value
     * @param $hashedValue
     * @param array $options
     * @return bool
     * @throws \System\Library\RuntimeException
     */
    function hash_check($value, $hashedValue, array $options = []) {
        $hash = new Hash();
        return $hash->check($value, $hashedValue, $options);
    }
}