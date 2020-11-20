<?php

namespace System\Library\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class BaseModel extends Model
{
    public function __construct()
    {
        $driver = config('database.default');

        $config = config('database.'.$driver);

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => $driver,
            'host'      => $config['host'],
            'database'  => $config['dbname'],
            'username'  => $config['user'],
            'password'  => $config['password'],
            'charset'   => $config['charset'],
            'collation' => $config['collation'],
            'prefix'    => $config['prefix'],
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}