<?php

use yii\helpers\Url;

?>
<div style="margin-left: 25px">
    <a class="btn btn-success" href="<?= Url::to(['task/create']) ?>">Создать новую задачу</a>
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


