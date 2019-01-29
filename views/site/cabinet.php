<h1>Cabinet</h1>

<?
$model = \app\models\tables\Tasks::findOne(1);
\app\assets\CalendarAsset::register($this);

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