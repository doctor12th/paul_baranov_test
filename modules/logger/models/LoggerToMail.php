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
        Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['mail_to_log'])
            ->setFrom(Yii::$app->params['mail_from'])
            ->setSubject('Some action happened!')
            ->setHtmlBody($message)
            ->send();
    }
}