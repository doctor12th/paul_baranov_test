<?php

namespace app\modules\logger\models;

interface LoggerInterface {

    /**
     * Method that implements log logic in fabricated classes.
     *
     * @param string $message
     *   Message to log.
     */
    public function log(string $message): void;
}