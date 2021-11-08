<?php
declare(strict_types=1);

namespace Pt\Utils\Http;

trait ParameterCheck
{
    /**
     * 参数简单验证
     * @param array $request
     * @param array $checkData
     * @param bool $is_set
     * @return bool
     */
    public function checkParameter(array $request, array $checkData = [], bool $is_set = false): bool
    {
        if (empty($checkData)) {
            return true;
        }

        if ($is_set) {
            foreach ($checkData as $v) {
                if (!isset($request[$v])) {
                    return false;
                }
            }
        } else {
            foreach ($checkData as $v) {
                if (!isset($request[$v]) || empty($request[$v])) {
                    return false;
                }
            }
        }
        return true;
    }


    /**
     * 字段转换
     * @param array $array
     * @param array $request
     * @return array 返回数据数组
     */
    protected function buildParameter(array $array, array $request): array
    {
        $data = [];
        if (is_array($array) && !empty($array)) {
            foreach ($array as $item => $value) {
                $data[$item] = $request[$value];
            }
        }
        return $data;
    }
}