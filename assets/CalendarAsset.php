<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 30.01.2019
 * Time: 1:11
 */

namespace app\assets;


use yii\web\AssetBundle;

class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/task.css',
    ];

    public $depends = [
    ];
}