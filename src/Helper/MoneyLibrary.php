<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

/**
 * 金额转换
 * Class MoneyLibrary
 * @package Pt\Utils\Helper
 */
class MoneyLibrary extends BaseLibrary
{
    /**
     * 金额分 转 元
     * @param string $price
     * @param string $percent
     * @return string
     */
    public function dePriceFormat(string $price, string $percent = '0.01') : string
    {
        return bcmul($price, $percent, 2);
    }

    /**
     * 金额元转 分
     * @param string $price
     * @param string $hundred
     * @return string
     */
    public function enPriceFormat(string $price, string $hundred = '100') : string
    {
        return bcmul($price, $hundred, 0);
    }

    /**
     * 金额分转元
     * @param string $price
     * @return string
     */
    public function dePriceGoToZeroFormat(string $price) : string
    {
        $price = $this->dePriceFormat($price);
        $price_arr = explode('.', $price);
        if (!isset($price_arr[1])) {
            return $price_arr[0];
        }
        if ($price_arr[1] == '00') {
            return $price_arr[0];
        }
        return $price;
    }
}