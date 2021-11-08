<?php
declare(strict_types=1);

namespace Pt\Utils\Param;

class Param
{
    /** 页码 @var int */
    public $page = 1;

    /** 每页数量 @var int */
    public $limit = 10;

    /** 关键字 @var string */
    public $keyword = '';

    /**
     * 计算redis集合分页
     * @param param $param
     * @return param
     */
    public function buildRedisPage(param $param): param
    {
        $page = ($param->page - 1) * $param->limit;
        $param->limit = ($param->page * $param->limit) - 1;
        $param->page = $page;
        return $param;
    }
}
