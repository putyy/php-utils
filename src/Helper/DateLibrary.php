<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

/**
 * Class DateLibrary
 * @package Pt\Utils\Helper
 */
class DateLibrary extends BaseLibrary
{
    /**
     * 获取当前周几
     * @param int $time
     * @return string
     */
    public function getNowWeek(int $time = 0): string
    {
        $time = $time ?: time();
        $week = date('w', $time);
        $arr = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
        return $arr[$week];
    }

    /**
     * 获取当前星期
     * @param int $time
     * @return string
     */
    public function getWeekByTime(int $time = 0): string
    {
        $time = $time ?: time();
        $week = date('w', $time);
        $arr = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
        return $arr[$week];
    }

    /**
     * 计算两个日期间的差值
     * @param string $start_time
     * @param string $end_time
     * @return object
     */
    public function diffDay(string $start_time, string $end_time): object
    {
        $date1 = date_create($start_time);
        $date2 = date_create($end_time);
        return date_diff($date1, $date2);
    }

    /**
     * 秒转分 向上取整
     * @param int $second
     * @return float
     */
    public function secondPoints(int $second): float
    {
        return ceil($second / 60);
    }

    /**
     * 将小时转换为秒
     * @param string $date
     * @return int
     */
    public function hoursTurnSecond(string $date = ''): int
    {
        if ($date) {
            $data = date_parse($date);
            return $data['hour'] * 3600 + $data['minute'] * 60 + $data['second'];
        }
        $data = getdate();
        return $data['hours'] * 3600 + $data['minutes'] * 60 + $data['seconds'];
    }

    /**
     * @param int $time
     * @return string
     */
    public function handleTimes(int $time): string
    {
        $second = $time - time();
        $second = abs($second);
        $tag = '';
        if ($second < 60) {
            $tag = '刚刚';
        }
        if (60 <= $second && $second < 3600) {
            $tag = floor($second / 60) . '分钟前';
        }
        if (3600 <= $second && $second < 86400) {
            $tag = floor($second / 3600) . '小时前';
        }
        if ($second >= 86400) {
            $tag = date('Y年-m月-d日', $time);
        }

        return $tag;
    }

    /**
     * 秒换成分 带余秒
     * @param int $second
     * @return string
     */
    public function secondPointsTimeLength(int $second): string
    {
        $str = '';
        $i = floor($second / 60);
        if ($i > 0) {
            $str = $i . '分';
        }
        $s = $second % 60;
        $str .= $s . '秒';
        return $str;
    }

    /**
     * 月份简称
     * @param int $month
     * @return string
     */
    public function monthForShort(int $month): string
    {
        $month_for_short = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ];

        return $month_for_short[$month] ?? '';
    }
}