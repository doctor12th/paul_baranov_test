<?php

namespace app\modules\logger;

interface LoggerContextInterface
{
    /**
     * Sends message to current logger.
     *
     * @param string $message
     *   Message text.
     */
    public function send(string $message): void;


    /**
     * Sends message by selected logger.
     *
     * @param string $message
     *   Message text.
     * @param string $loggerType
     *   Logger type.
     */
    public function sendByLogger(string $message, string $loggerType): void;


    /**
     * Gets current logger type.
     *
     * @return string
     */
    public function getType(): string;


    /**
     * Sets current logger type.
     *
     * @param string $type
     */
    public function setType(string $type): void;
}