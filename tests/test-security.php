<?php
require_once __DIR__."/index.php";

var_dump($str = \Pt\Utils\Facade\Lib\SecurityFacade::simpleEncryption(["aaa"=>1111]));
var_dump(\Pt\Utils\Facade\Lib\SecurityFacade::simpleDecryption($str));


var_dump($key = \Pt\Utils\Facade\Lib\SecurityFacade::smallSecretKey());
var_dump(\Pt\Utils\Facade\Lib\SecurityFacade::smallCheck($key));


var_dump(explode(' ',  'a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9'));