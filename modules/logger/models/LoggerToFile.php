<?php

namespace app\modules\logger\models;

use Yii;

/**
 * Class for logging to file.
 */
class LoggerToFile implements LoggerInterface {

    /*
     * {@inheritDoc}
     */
    public function log(string $message): void {
        file_put_contents(Yii::getAlias('@runtime') . '/logs/' . date('Y-m-d') . '.log', $message, FILE_APPEND);
    }

}