<?php

use yii\helpers\Html;
use common\widgets\FrontView;
/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= FrontView::widget([
        'model' => $model,
        'template'=>'<tr><td{contentOptions}>{value}</td></tr>',
        'attributes' => [
            'date:Date',
            'content:Raw',
        ],
    ]) ?>

</div>
