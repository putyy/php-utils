<?php
declare(strict_types=1);

namespace Pt\Utils\Facade;

use Pt\Utils\Helper\ContextLibrary;

abstract class BaseFacade
{
    abstract protected static function getFacadeClass(): array;

    protected static function createFacade()
    {
        $classInfo = static::getFacadeClass();
        $className = $classInfo[0];
        if (!ContextLibrary::has($className)) {
            if (isset($classInfo[1])) {
                unset($classInfo[0]);
                ContextLibrary::set($className, new $className(...$classInfo));
            } else {
                ContextLibrary::set($className, new $className);
            }
        }
        return ContextLibrary::get($className);
    }

    public static function __callStatic($method, $params)
    {
        return call_user_func_array([static::createFacade(), $method], $params);
    }
}
