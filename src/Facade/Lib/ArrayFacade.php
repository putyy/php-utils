<?php
declare(strict_types=1);

namespace Pt\Utils\Facade\Lib;

use Pt\Utils\Facade\BaseFacade;
use Pt\Utils\Helper\ArrayLibrary;

/**
 * Class ArrayFacade
 * @method static arrayGroupBy(array $arr, string $key) : array
 * @method static getSubTree(array $data,string $parent, string $son, int $pid = 0) : array
 * @method static getMenuTree(array $arrCat, int $parent_id = 0, string $pk = 'pid', string $ck = 'id',int $level = 0) : array
 * @method static arraySort(array $array,string $keys,string $sort='asc') : array
 * @package Pt\Utils\Facade\Lib
 */
class ArrayFacade extends BaseFacade
{
    protected static function getFacadeClass(): array
    {
        return [ArrayLibrary::class];
    }
}