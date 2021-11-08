<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

/**
 * Class CompanyLibrary
 * 处理数量单位
 * @package Pt\Utils\Helper
 */
class CompanyLibrary extends BaseLibrary
{
    /**
     * @param string $number
     * @return string
     */
    public function getNumberK(string $number): string
    {
        if ($number < 1000) {
            return $number;
        }

        if ($number < 10000) {
            return (bcdiv($number, '1000', 1)) . 'k';
        }

        if ($number < 10000000) {
            return floatval(bcdiv($number, '10000', 3)). 'w';
        }

        return floatval(bcdiv($number, '100000000', 3)). '亿';
    }

    /**
     * @param string $number
     * @return string
     */
    public function getNumberW(string $number): string
    {
        if ($number < 10000) {
            return $number;
        }

        if ($number < 10000000) {
            return floatval(bcdiv($number, '10000', 3)). 'w';
        }

        return floatval(bcdiv($number, '100000000', 3)). '亿';
    }
}