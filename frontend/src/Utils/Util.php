<?php

namespace BGDS\Utils;

use Illuminate\Http\Request;

class Util
{
    const COOKIE_EXPIRATION = 2628000;
    const TOKEN = 'token';
    const TOKEN_EXPIRE = 'expires_in';
    const REFRESH_TOKEN = 'refresh';
    const EMAIL = 'email';
    const DEVICE_TYPE_MOBILE = 'mobile';
    const DEVICE_TYPE_TABLET = 'tablet';
    const DEVICE_TYPE_DESKTOP = 'desktop';

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public static function getDeviceType()
    {
        $mobileDetect = new \Mobile_Detect();
        if ($mobileDetect->isTablet() === true) {
            return self::DEVICE_TYPE_TABLET;
        }

        if ($mobileDetect->isMobile() === true) {
            return self::DEVICE_TYPE_MOBILE;
        }

        return self::DEVICE_TYPE_DESKTOP;
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public static function getHostName(Request $request)
    {
        $urlParts = parse_url($request->url());
        if (empty($urlParts['host'])) {
            return '';
        }

        return $urlParts['host'];
    }

    /**
     * @param string $url
     * @return string
     */
    public static function getPath(string $url)
    {
        $urlParts = parse_url($url);

        if (empty($urlParts['host'])) {
            return '';
        }

        return $urlParts['path'] ?? '';
    }

    /**
     * @param string $url
     * @param string $lang
     * @param bool $full
     * @return string
     */
    public static function getNewUrl(string $url, string $lang = '', bool $full = false)
    {
        $urlParts = parse_url($url);
        if (empty($urlParts['host'])) {
            return '';
        }

        return sprintf(
            '%s://%s%s',
            $urlParts['scheme'],
            (empty($lang) ? $urlParts['host'] : $lang.substr($urlParts['host'], 2)),
            $full ? $urlParts['path']: ''
        );
    }

    /**
     * @param string $url
     * @param bool $full
     * @return string
     */
    public static function getUrl(string $url, bool $full = false)
    {
        $urlParts = parse_url($url);
        if (empty($urlParts['host'])) {
            return '';
        }

        return sprintf(
            '%s://%s%s',
            $urlParts['scheme'],
            $urlParts['host'],
            $full ? $urlParts['path']: ''
        );
    }

    public static function mbUcfirst($str)
    {
        $fc = mb_strtoupper(mb_substr($str, 0, 1));
        return $fc.mb_substr(mb_strtolower($str), 1);
    }

    public static function arrayRandom($arr, $num = 1) {
        shuffle($arr);

        $r = array();
        for ($i = 0; $i < $num; $i++) {
            $r[] = $arr[$i];
        }
        return $num == 1 ? $r[0] : $r;
    }

    public static function arrayRandomAssoc($arr, $num = 1) {
        $keys = array_keys($arr);
        shuffle($keys);

        $r = array();
        for ($i = 0; $i < $num; $i++) {
            $r[$keys[$i]] = $arr[$keys[$i]];
        }
        return $r;
    }
}
