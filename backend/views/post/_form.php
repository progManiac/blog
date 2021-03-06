<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 10]) ?>

<!--    <= $form->field($model, 'created_at')->textInput() ?> -->

<!--    <= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">

        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

<!--        <= Html::submitButton(Yii::t('app', 'Save and Publish'), ['class' => 'btn btn-success']) ?>-->

    </div>

    <?php ActiveForm::end(); ?>

</div>
