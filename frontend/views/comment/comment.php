<?php

use yii\helpers\Html;

?>

<div class="comment">
    <div class="username">
        <?= Html::encode('name') ?>
    </div>
    <div class="posted">
        <?= Html::encode('datetime') ?>
    </div>
    <div class="comment-content">
        <?= Html::encode('Sample text') ?>
    </div>
    <div class="children">
        <?php
          do
            if (rand(0, 1))
            require 'comment.php';
            while (rand(0, 1));
        ?>
    </div>
</div>


