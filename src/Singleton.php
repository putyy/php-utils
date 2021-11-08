<?php
declare(strict_types=1);

namespace Pt\Utils;

class Singleton
{
    private static $instance;

    static function getInstance(...$args): Singleton
    {
        if (!isset(self::$instance)) {
            self::$instance = new static(...$args);
        }
        return self::$instance;
    }
}