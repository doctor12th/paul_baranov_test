<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Result';

if (is_null($model->type)) {
    $message = "'" . $model->message . "' was sent to all availabel logger types.";
} else {
    $message = "'" . $model->message ."' was sent with type" . $model->type;
}
?>
<h2><?= Html::encode($message) ?>.</h2>