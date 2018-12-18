<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 18.12.2018
 * Time: 15:46
 */

namespace app\controllers;


use yii\web\Controller;

class TaskController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index', [
            'title' => 'My first controller',
            'content' => 'Всякое'
        ]);
    }
}