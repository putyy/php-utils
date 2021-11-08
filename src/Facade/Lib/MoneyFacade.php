<?php
declare(strict_types=1);

namespace Pt\Utils\Facade\Lib;

use Pt\Utils\Facade\BaseFacade;
use Pt\Utils\Helper\MoneyLibrary;

/**
 * Class MoneyFacade
 * @method static dePriceFormat(string $price) : string
 * @method static enPriceFormat(string $price) : string
 * @method static dePriceGoToZeroFormat(string $price) : string
 * @package Pt\Utils\Facade\Lib
 */
class MoneyFacade extends BaseFacade
{
    protected static function getFacadeClass(): array
    {
        return [MoneyLibrary::class];
    }
}