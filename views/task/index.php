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
    'options' =>[
        'class'=> 'taskConteiner'
    ]

]);