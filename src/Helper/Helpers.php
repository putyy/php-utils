<?php
declare(strict_types=1);

if (!function_exists('getSavePath')) {
    function getSavePath(string $url, $needle = 'upload'): string
    {
        $pathInfo = parse_url($url);
        $start = strpos($pathInfo['path'], $needle);
        $str = '';
        if ($start !== false) {
            $str = substr($pathInfo['path'], $start);
        }
        return $str;
    }
}