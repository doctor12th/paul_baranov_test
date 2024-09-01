<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
$this->title = 'Logger';
?>
<h1>Select logger to test</h1>

<div class="row">
    <div class="col-lg-5">

        <?php $form = ActiveForm::begin(['id' => 'test-logger-form']); ?>

        <?= $form->field($model, 'message')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'type')->radioList(['db'=>'Database', 'file' => 'To File', 'mail' => 'To mail']) ?>

        <?= $form->field($model, 'to_all')->checkbox(['label' => 'Send message to all']) ?>

        <div class="form-group">
            <?= Html::submitButton('Send log message with selected type',
                [
                    'class' => 'btn btn-primary',
                    'name' => 'log',
                    ]
            ) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>