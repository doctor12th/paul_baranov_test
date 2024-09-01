<?php

namespace app\modules\logger;

use app\modules\logger\models\LoggerToDatabase;
use app\modules\logger\models\LoggerToFile;
use app\modules\logger\models\LoggerToMail;

/**
 * Fabric logic.
 */
class LoggerFactory {

    /**
     * Fabric class constructor.
     *
     * @throws \Exception
     */
    public static function create($loggerType): object {
        return match ($loggerType) {
            'db' => new LoggerToDatabase(),
            'mail' => new LoggerToMail(),
            'file' => new LoggerToFile(),
            default => throw new \Exception("Logger type not supported"),
        };
    }

}