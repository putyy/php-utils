<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

class ArrayLibrary extends BaseLibrary
{
    /**
     * 传入$arr二维数组 根据$key分组
     * @param array $arr
     * @param string $key
     * @return array
     */
    public function arrayGroupBy(array $arr, string $key) : array
    {
        $grouped = array();
        foreach ($arr as $k => $value) {
            $grouped[$value[$key]][$k] = $value;
        }
        if (func_num_args() > 2) {
            $args = func_get_args();
            foreach ($grouped as $key => $value) {
                $params = array_merge(array($value), array_slice($args, 2, func_num_args()));
                $grouped[$key] = call_user_func_array('array_group_by', $params);
            }
        }
        return $grouped;
    }

    /**
     * 传入二维数组,获取树状结构上下级关系
     * @param array $arrCat
     * @param int $parent_id
     * @param string $pk
     * @param string $ck
     * @param int $level
     * @return array|bool
     */
    public function getMenuTree(array $arrCat, int $parent_id = 0, string $pk = 'pid', string $ck = 'id',int $level = 0) : array
    {
        static $arrTree = array();
        if (empty($arrCat)) return FALSE;
        $level++;
        foreach ($arrCat as $key => $value) {
            if ($value[$pk] == $parent_id) {
                $value['level'] = $level;
                $arrTree[] = $value;
                unset($arrCat[$key]);
                self::getMenuTree($arrCat, $value[$ck], $pk, $ck, $level);
            }
        }

        return $arrTree;
    }

    /**
     * 传入二维数组,获取树状结构上下级关系
     * @param array $data
     * @param string $parent
     * @param string $son
     * @param int $pid
     * @return array
     */
    public function getSubTree(array $data,string $parent, string $son, int $pid = 0) : array
    {
        $tmp = [];
        foreach ($data as $key => $value) {
            if ($value[$parent] == $pid) {
                $value['child'] = self::getSubTree($data, $parent, $son, $value[$son]);
                $tmp[] = $value;
            }
        }
        return $tmp;
    }

    /**
     * 指定键值对数组进行排序
     * @param array $array
     * @param string $keys
     * @param string $sort
     * @return array
     */
    public function arraySort(array $array,string $keys,string $sort='asc') : array
    {
        $newArr =
        $valArr = array();
        foreach ($array as $key => $value) {
            $valArr[$key] = $value[$keys];
        }
        ($sort == 'asc') ? asort($valArr) : arsort($valArr);
        reset($valArr);
        foreach ($valArr as $key => $value) {
            $newArr[$key] = $array[$key];
        }
        return $newArr;
    }

    /**
     * url 参数解析
     * @param string $url
     * @return array
     */
    public function convertUrlQuery(string $url) : array
    {
        $arr = parse_url(urldecode($url));
        parse_str($arr['query'],$query_arr);

        $query_arr = array_filter($query_arr);

        foreach ($query_arr as $key => &$value){
            if(is_numeric($value)){
                $value = (int)$value;
            }
        }

        return $query_arr;
    }
}