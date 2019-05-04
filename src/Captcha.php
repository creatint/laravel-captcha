<?php

namespace Creatint\Captcha;

use Mews\Captcha\Captcha as MewsCaptcha;
use Illuminate\Support\Facades\Cache;
use Illuminate\Config\Repository;
use Illuminate\Hashing\BcryptHasher as Hasher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Session\Store as Session;
use Exception;

class Captcha extends MewsCaptcha
{
    /**
     * Constructor
     *
     * @param Filesystem $files
     * @param Repository $config
     * @param ImageManager $imageManager
     * @param Session $session
     * @param Hasher $hasher
     * @param Str $str
     * @throws Exception
     * @internal param Validator $validator
     */
    public function __construct(
        Filesystem $files,
        Repository $config,
        ImageManager $imageManager,
        Session $session,
        Hasher $hasher,
        Str $str
    )
    {
        parent::__construct($files, $config, $imageManager, $session, $hasher, $str);
    }

    public function create($config = 'default', $api = false)
    {
        if (!$api) {
            if (ob_get_contents()) {
                ob_clean();
            }
            return MewsCaptcha::create($config);
        }

        $data = MewsCaptcha::create($config, true);
        Cache::add($data['key'], true, 5);
        return $data;
    }


    public function check_api($value, $key = null)
    {
        if (!MewsCaptcha::check_api($value, $key)) {
            return false;
        }
        if (!Cache::get($key)) {
            return false;
        }
        Cache::forget($key);
        return true;
    }
}