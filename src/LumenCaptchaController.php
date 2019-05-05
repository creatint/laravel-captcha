<?php

namespace Creatint\Captcha;

use Laravel\Lumen\Routing\Controller;

class LumenCaptchaController extends Controller
{
    /**
     * get CAPTCHA
     *
     * @param \Creatint\Captcha\Captcha $captcha
     * @param string $config
     * @return \Intervention\Image\ImageManager->response
     */
    public function getCaptcha(Captcha $captcha, $config = 'default')
    {
        return $captcha->create($config);
    }
}
