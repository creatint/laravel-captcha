<?php

namespace Creatint\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed create(string $config, bool $api)
 * @method static bool check(string $value)
 * @method static bool check_api(string $value, string $key)
 *
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