<?php
declare(strict_types=1);

namespace Pt\Utils;

use Pt\Utils\Facade\Lib\StringFacade;

trait AttributeSetGetTrait
{
    /**
     * @param $name
     * @param $arguments
     * @return  object | string | int | $this
     */
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        if (preg_match("/^set([a-z][a-z0-9]+)$/i", $name, $array) || preg_match("/^get([a-z][a-z0-9]+)$/i", $name, $array)) {
            if (
                property_exists( $this, $property = StringFacade::unCame($array[1]) )
                ||
                property_exists( $this, $property = lcfirst($array[1]) )
            ) {
                if (substr($name, 0, 3) === 'get') {
                    return $this->$property;
                } else {
                    $this->$property = $arguments[0];
                    return $this;
                }
            }
        }
        throw new Exception('参数错误~~');
    }
}