<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'gid',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' =>'title',
                'template' => '{view}',
                'buttons'=>[
                        'view' => function($url, $model, $key){
                            return Html::a($model->title, $url);
                        }
                ]
            ],
            'date:date',
            //'content:ntext',
            //'excerpt:ntext',
            // 'alias',
            // 'author',
            // 'sortid',
            // 'type',
            // 'views',
            // 'comnum',
            // 'attnum',
            // 'top',
            // 'sortop',
            // 'hide',
            // 'checked',
            // 'allow_remark',
            // 'password',
            // 'template',
            // 'tags:ntext',


        ],
    ]); ?>
</div>
