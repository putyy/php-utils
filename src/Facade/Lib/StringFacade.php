<?php
declare(strict_types=1);

namespace Pt\Utils\Facade\Lib;

use Pt\Utils\Facade\BaseFacade;
use Pt\Utils\Helper\StringLibrary;

/**
 * Class SecurityFacade
 * @method static filterEmoji(string $str): string
 * @method static throwableToString(\Throwable $throwable): string
 * @method static hide(string $str) : string
 * @method static filter(string $str) : string
 * @method static strCutRepeat(string $user_name) : string
 * @method static unCame(string $user_name) : string
 * @method static round(int $len = 6): string
 * @method static roundArray(int $len = 16, int $number = 21): array
 * @mixin StringLibrary
 * @package Pt\Utils\Facade
 */
class StringFacade extends BaseFacade
{
    protected static function getFacadeClass(): array
    {
        return [StringLibrary::class];
    }
}