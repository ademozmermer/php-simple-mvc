<?php

namespace System\Core;

class Kernel
{
    public function initApp()
    {
        $app = Import::config('services');
    }
}