<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 20.01.2019
 * Time: 11:07
 */

namespace app\controllers;


use app\models\tables\Tasks;
use Yii;
use yii\caching\DbDependency;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\PageCache;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CabinetController extends Controller
{
    public function actionIndex()
    {
        $cache = Yii::$app->cache;

        $key = 'task_';

        $dependency = new DbDependency();
        $dependency->sql = "SELECT COUNT(*) FROM tasks";

        if (!$task = $cache->get($key)) {
            $cache->set($key, $task, 200, $dependency);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->where(['responsible_id' => Yii::$app->user->identity->getId()])
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}