<?php

namespace app\modules\logger\models;

use Yii;

/*
 * Class for logging to mail.
 */
class LoggerToMail implements LoggerInterface {

    /**
     * {@inheritDoc}
     */
    public function log(string $message): void {
        $params = Yii::$app->getModule('logger')->params;
        Yii::$app->mailer->compose()
            ->setTo($params['mail_to_log'])
            ->setFrom($params['mail_from'])
            ->setSubject('Some action happened!')
            ->setHtmlBody($message)
            ->send();
    }
}