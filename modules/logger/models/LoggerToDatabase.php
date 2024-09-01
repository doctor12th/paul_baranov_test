<?php

namespace app\modules\logger\models;

use Yii;

/**
 * Class for logging to database.
 */
class LoggerToDatabase implements LoggerInterface{

    /**
     * {@inheritDoc}
     * @throws \yii\db\Exception
     */
    public function log(string $message): void {
        Yii::$app->db->createCommand()->insert('log', [
            'message' => $message,
            'created_at' => time(),
        ])->execute();
    }

}