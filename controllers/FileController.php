<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 20.01.2019
 * Time: 13:37
 */

namespace app\controllers;


use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;

class FileController extends Controller
{
    public function actionIndex()
    {

        $model = new Upload();
        if ($model->load(\Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
            exit;

        }
        return $this->render('index', ['model' => $model]);
    }

    public function actionI18n()
    {
        \Yii::$app->language = 'en';
        echo \Yii::t("main", "error",['number'=>404]);
    }
}