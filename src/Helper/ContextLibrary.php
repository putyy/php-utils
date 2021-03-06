<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

/**
 * Class ContextLibrary
 * @package app\common\Tool
 */
class ContextLibrary
{
    protected static $nonCoContext = [];

    /**
     * @param string $id
     * @param $value
     * @return mixed
     */
    public static function set(string $id, $value)
    {
        static::$nonCoContext[$id] = $value;
        return $value;
    }

    /**
     * @param string $id
     * @param null $default
     * @return mixed|null
     */
    public static function get(string $id, $default = null)
    {
        return static::$nonCoContext[$id] ?? $default;
    }

    /**
     * @param string $id
     * @return bool
     */
    public static function has(string $id): bool
    {
        return isset(static::$nonCoContext[$id]);
    }

    /**
     * @param string $id
     */
    public static function destroy(string $id)
    {
        unset(static::$nonCoContext[$id]);
    }

    /**
     * @param string $id
     * @param \Closure $closure
     * @return mixed|null
     */
    public static function override(string $id, \Closure $closure)
    {
        $value = null;
        if (self::has($id)) {
            $value = self::get($id);
        }
        $value = $closure($value);
        self::set($id, $value);
        return $value;
    }

    /**
     * @param string $id
     * @param $value
     * @return mixed|null
     */
    public static function getOrSet(string $id, $value)
    {
        if (!self::has($id)) {
            return self::set($id, $value instanceof \Closure ? $value() : $value);
        }
        return self::get($id);
    }

    /**
     * @return array
     */
    public static function getContainer(): array
    {
        return static::$nonCoContext;
    }

    public static function getChildValue(string $id, $key)
    {
        return static::$nonCoContext[$id][$key] ?? null;
    }
}
