<?php

namespace app\modules\logger;

use yii\base\Module;

/**
 * Module class.
 */
class LoggerModule extends Module {

    /**
     * Initial function.
     */
    public function init(): void {
        parent::init();

        \Yii::configure($this, require(__DIR__ . '/config/web.php'));
    }
}