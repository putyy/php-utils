<?php
declare(strict_types=1);

namespace Pt\Utils\Facade\Lib;

use Pt\Utils\Facade\BaseFacade;
use Pt\Utils\Helper\SecurityLibrary;

/**
 * Class SecurityFacade
 * @method static simpleEncryption(array $data, int $len = 10): string
 * @method static simpleDecryption(string $key, int $len = 10): array
 * @method static smallSecretKey(string $timeRange = 'h', ?string  $sign=null): string
 * @method static smallCheck(string $key, string $timeRange = 'h', ?string  $sign=null): bool
 * @mixin SecurityLibrary
 * @package Pt\Utils\Facade
 */
class SecurityFacade extends BaseFacade
{
    protected static function getFacadeClass(): array
    {
        return [SecurityLibrary::class];
    }
}