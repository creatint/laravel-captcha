<?php

namespace Creatint\Captcha;

use Illuminate\Routing\Controller;

class CaptchaController extends Controller
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
        if (ob_get_contents()) {
            ob_clean();
        }

        return $captcha->create($config);
    }

    /**
     * get CAPTCHA api
     *
     * @param \Creatint\Captcha\Captcha $captcha
     * @param string $config
     * @return \Intervention\Image\ImageManager->response
     */
    public function getCaptchaApi(Captcha $captcha, $config = 'default')
    {
        return $captcha->create($config, true);
    }
}
