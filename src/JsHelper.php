<?php

namespace algsupport\swiperjs8;

use Yii;

/**
 * Js helper class for php.
 */
class JsHelper
{
    /**
     * initVar function.
     *
     * @param string        $name
     * @param object|string $value . Object type: \yii\web\JsExpression
     *
     * @return string
     */
    public static function initVar($name, $value)
    {
        return "var {$name} = {$value}";
    }

    /**
     * addString function.
     *
     * @param string $value
     *
     * @return string
     */
    public static function addString($value)
    {
        return "\"{$value}\"";
    }

    /**
     * newJsObject function.
     *
     * @param string $instanceName
     * @param array  $params
     *
     * @return string \yii\web\JsExpression. See https://www.yiiframework.com/doc/api/2.0/yii-web-jsexpression for more information about it.
     */
    public static function newJsObject($instanceName, $params = [])
    {
        $params = implode(',', $params);

        return new \yii\web\JsExpression("new {$instanceName}({$params})");
    }
}
