<?php

namespace app\modules\logger;

class LoggerContext implements LoggerContextInterface {

    private string $type;

    private object $handler;

    /**
     * @throws \Exception
     */
    public function __construct(string $type) {
        $this->setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void {
        $this->handler->send($message);
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function sendByLogger(string $message, string $loggerType): void {
        $this->setType($loggerType);
        $this->handler->send($message);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Exception
     */
    public function setType(string $type): void {
        $this->type = $type;
        $this->handler = LoggerFactory::create($type);
    }
}