<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php
    echo \app\widgets\TaskWidget::widget()
    //    $dataProvider = new \yii\data\ActiveDataProvider([
    //            'query'=>'',
    //    ])
    ?>


    <!--    --><?php //\yii\widgets\ListView::widget([
    //            'dataProvider' =>$dataProvider,
    //            'itemView'=>'task'
    //    ]);
    //    ?>
</div>
