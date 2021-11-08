<?php
declare(strict_types=1);

namespace Pt\Utils\Facade\Lib;

use Pt\Utils\Facade\BaseFacade;
use Pt\Utils\Helper\DateLibrary;

/**
 * Class DateFacade
 * @method static getNowWeek(int $time = 0) : string
 * @method static diffDay(string $start_time, string $end_time) : object
 * @method static secondPoints(int $second) : float
 * @method static hoursTurnSecond(string $date='') : int
 * @method static handleTimes(int $time) : string
 * @method static secondPointsTimeLength(int $second) : string
 * @method static monthForShort(int $month) : string
 * @method static getWeekByTime(int $time = 0) : string
 * @package Pt\Utils\Facade\Lib
 */
class DateFacade extends BaseFacade
{
    protected static function getFacadeClass(): array
    {
        return [DateLibrary::class];
    }
}