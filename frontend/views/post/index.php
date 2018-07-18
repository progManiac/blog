<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'value' => function($model) {
                    return Html::a($model->title, ['view', 'id' => $model->id]);
                },
                'format' => 'html',

            ],
            [
                'attribute' => 'body',
                'value' => function($model) {
                    return substr($model->body, 0, 80) . '...';
                }
            ],
            'created_at',


        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
