<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 14:23
 */

namespace app\common\helper;


class MathTest
{
    public function add($a, $b){
        return $a + $b;
    }
}

function sub($a, $b) {
    return $a - $b;
}

return sub(4, 5);

//echo "math test";
//$math = new MathTest();
//return $math->add(1, 6);
