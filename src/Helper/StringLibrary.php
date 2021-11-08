<?php
declare(strict_types=1);

namespace Pt\Utils\Helper;

class StringLibrary extends BaseLibrary
{
    /**
     * 隐藏字符串
     * @param string $str
     * @return string
     */
    public function hide(string $str): string
    {
        return empty($str) ? '***********' : str_replace(mb_substr($str, 3, 3), '***', $str);
    }

    /**
     * 过滤掉emoji表情
     * @param $str
     * @return string|string[]|null
     */
    public function filterEmoji(string $str): string
    {
        $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);

        return $str;
    }

    public function throwableToString(\Throwable $throwable): string
    {
        return 'file:' . $throwable->getFile() . '---line:' . $throwable->getLine() . '---msg:' . $throwable->getMessage();
    }


    /**
     * 过滤特殊字符
     * @param string $str
     * @return string
     */
    public function filter(string $str): string
    {
        $str = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $str);
        $str = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $str);
        $str = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $str);
        $str = preg_replace('/[\x{2600}-\x{26FF}]/u', '', $str);
        $str = preg_replace('/[\x{2700}-\x{27BF}]/u', '', $str);
        $str = str_replace(array('"', '\''), '', $str);
        return addslashes(trim($str));
    }

    /**
     * 用户名保密处理：某**某
     * @param string $str
     * @return string
     */
    public function strCutRepeat(string $str): string
    {
        $strLen = mb_strlen($str, 'utf-8');
        if ($strLen && $strLen >= 2) {
            $firstStr = mb_substr($str, 0, 1, 'utf-8');
            $lastStr = mb_substr($str, -1, 1, 'utf-8');
            return $strLen == 2 ? $firstStr . str_repeat('*', $strLen - 1) :
                $firstStr . str_repeat("*", $strLen - 2) . $lastStr;
        }
        return $str;
    }

    public function unCame(string $str): string
    {
        $str = preg_replace_callback('/([A-Z]{1})/',function($matches){
            return '_'.strtolower($matches[0]);
        },$str);
        return ltrim($str, '_');
    }

    protected $roundArr = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    public function round(int $len = 6): string
    {
        $arr = $this->roundArr;
        $rand_keys = array_rand($arr, $len);
        shuffle($rand_keys);
        $code = '';
        foreach ($rand_keys as $index=>$key){
            $code .= $arr[$key];
        }
        return $code;
    }

    public function roundArray(int $len = 16, int $number = 21): array
    {
        $res = [];
        $arr = $this->roundArr;
        mt_srand();
        do {
            $rand_keys = array_rand($arr, $len);
            shuffle($rand_keys);
            $code = '';
            foreach ($rand_keys as $index => $key) {
                $code .= $arr[$key];
            }
            array_push($res, $code);
            --$number;
        } while ($number);
        return $res;
    }
}