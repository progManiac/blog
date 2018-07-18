<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($model->status != $model::STATUS_DELETED) echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($model->status == $model::STATUS_SAVED)
                echo Html::a(Yii::t('app', 'Publish'), ['publish', 'id' => $model->id], ['class' => 'btn btn-publish']);
              elseif ($model->status == $model::STATUS_PUBLISHED) {
                echo Html::a(Yii::t('app', 'Hide'), ['hide', 'id' => $model->id], ['class' => 'btn btn-publish']);
}       ?>
        <?php if ($model->status == $model::STATUS_DELETED)
            echo Html::a(Yii::t('app', 'Restore'), ['restore', 'id' => $model->id], ['class' => 'btn btn-primary']);
        else {
            echo Html::a(Yii::t('app', 'Delete'), ['pseudelete', 'id' => $model->id], ['class' => 'btn btn-danger']);
        }       ?>
       <!-- < /*= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */?>-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'body:ntext',
            'created_at',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    if ($model->status == $model::STATUS_SAVED)
                        return 'Saved';
                    if ($model->status == $model::STATUS_PUBLISHED)
                        return 'Published';
                    if ($model->status == $model::STATUS_DELETED)
                        return 'Deleted';
                }
            ]
        ],
    ]) ?>

</div>
