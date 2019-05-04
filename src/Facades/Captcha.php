<?php

namespace Creatint\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creatint\Captcha\Captcha
 */
class Captcha extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'captcha';
    }
}