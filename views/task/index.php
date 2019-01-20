<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div style="margin-left: 25px; display: flex;align-items: center;">
    <a class="btn btn-success"  style="margin-right: 10px" href="<?= Url::to(['task/create']) ?>">Создать новую задачу</a>
    <?php ActiveForm::begin(['method' => 'get']); ?>
    <?= Html::textInput('month') ?>
    <div class="form-group" >
        <?= Html::submitButton('Фильтр') ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?
$model = \app\models\tables\Tasks::findOne(1);

echo

\yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model) {
        return \app\widgets\TaskWidget::widget([
            'model' => $model
        ]);
    },
    'summary' => false,
    'options' => [
        'class' => 'taskConteiner'
    ]

]);

?>


