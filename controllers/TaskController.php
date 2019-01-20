<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 18.12.2018
 * Time: 15:46
 */

namespace app\controllers;


use app\models\forms\TaskAttachmentsAddForm;
use app\models\tables\TaskComments;
use app\models\tables\Tasks;
use app\models\tables\TaskStatus;
use app\models\tables\Users;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class TaskController extends Controller
{

    public function actionIndex()
    {

        $month = Yii::$app->request->get('month');

        if ($month) {
            $dataProvider = new ActiveDataProvider([
                'query' => Tasks::find()
                    ->where(['MONTH(date)' => $month])
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => Tasks::find()
            ]);
        }


        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);

    }

    public function actionOne($id)
    {
        return $this->render('one', [
            'model' => Tasks::findOne($id),
            'userList' => Users::getUsersList(),
            'statusesList' => TaskStatus::getList(),
            'userId' => Yii::$app->user->id,
            'taskComments' => new TaskComments(),
            'taskAttachmentForm' => new TaskAttachmentsAddForm()
        ]);
    }


    public function actionCreate()
    {
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'usersList' => Users::getUsersList()
        ]);
    }

    public function actionSave($id)
    {
        if ($model = Tasks::findOne($id)) {
            $model->load(Yii::$app->request->post());
            $model->save();
            Yii::$app->session->setFlash('success', "Изменения сохранены");
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось сохранить измнения');
        }
        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAddComment()
    {
        $model = new TaskComments();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "комментарий добавлен");
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось добавить комментарий');
        }
        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAddAttachment()
    {
        $model = new TaskAttachmentsAddForm();
        $model->load(Yii::$app->request->post());
        $model->file = UploadedFile::getInstance($model, 'file');
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Файл добавлен');
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось сохранить файл');
        }
        $this->redirect(Yii::$app->request->referrer);
    }
}