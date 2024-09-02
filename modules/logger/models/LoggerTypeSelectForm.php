<?php

namespace app\modules\logger\models;

use yii\base\Model;

class LoggerTypeSelectForm extends Model {
    public $message;

    public $type;

    public $to_all;

    public function rules()
    {
        return [
            [['message'], 'required'],
            ['type', 'string'],
            ['to_all', 'boolean'],
        ];
    }
}