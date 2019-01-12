<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 18.12.2018
 * Time: 15:46
 */

namespace app\controllers;


use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);

    }

    public function actionOne($id)
    {
        var_dump($id);
    }
}