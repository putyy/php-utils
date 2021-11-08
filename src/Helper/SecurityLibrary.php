<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

use Pt\Utils\Facade\Lib\StringFacade;

/**
 * 数据处理
 * Class SecurityLibrary
 * @package Pt\Utils\Helper
 */
class SecurityLibrary extends BaseLibrary
{
    /**
     * 简单数据加密
     * @param array $data
     * @param int $len
     * @return string
     */
    public function simpleEncryption(array $data, int $len = 10): string
    {
        $str = base64_encode(json_encode($data));
        $arr = str_split($str, $len);
        $arr[1] = StringFacade::roundArray(15, 1)[0] . $arr[1];
        return implode('', $arr);
    }

    public function simpleDecryption(string $key, int $len = 10): array
    {
        $key = str_replace(substr($key, $len, 15), '', $key);
        return json_decode(base64_decode($key), true);
    }

    /**
     * 极简验证
     */
    const LM_SIGN = 'dfsarferwt432rrew43254';

    public function smallSecretKey(string $timeRange = 'h', ?string  $sign=null): string
    {
        return md5($sign ?? self::LM_SIGN . date('Ymd' . $timeRange));
    }

    public function smallCheck(string $key, string $timeRange = 'h', ?string  $sign=null): bool
    {
        return $key === self::smallSecretKey($timeRange, $sign);
    }
}