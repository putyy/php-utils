<?php
declare(strict_types=1);

namespace Pt\Utils\Facade\Lib;

use Pt\Utils\Facade\BaseFacade;
use Pt\Utils\Helper\CompanyLibrary;

/**
 * Class CompanyFacade
 * @method static getNumberK(string $number)
 * @method static getNumberW(string $number)
 * @package Pt\Utils\Facade\Lib
 */
class CompanyFacade extends BaseFacade
{
    protected static function getFacadeClass(): array
    {
        return [CompanyLibrary::class];
    }
}