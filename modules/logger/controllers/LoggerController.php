<?php

namespace app\modules\logger\controllers;


use app\modules\logger\LoggerContext;
use app\modules\logger\models\LoggerTypeSelectForm;
use Yii;
use yii\web\Controller;

/**
 * Controller for module.
 */
class LoggerController extends Controller {

    private LoggerTypeSelectForm $model;

    public function actionSelectLog() {
        $this->model = new LoggerTypeSelectForm();
        if ($this->model->load(Yii::$app->request->post()) && $this->model->validate()) {
            $type = $this->model->type;
            if ($this->model->to_all) {
                $this->logToAll();
                return $this->render('@logger/views/logger/logger-result', ['model' => $this->model]);
            }
            if (isset($type)) {
                $this->logTo($type);
            } else {
                $this->model->type = Yii::$app->getModule('logger')->params;
                $this->log();
            }
            return $this->render('@logger/views/logger/logger-result', ['model' => $this->model]);
        }
        return $this->render('@logger/views/logger/logger', ['model' => $this->model]);
    }

    /**
     * Sends a log message to the default logger.
     *
     * @throws \Exception
     */
    public function log(): void {
        $params = Yii::$app->getModule('logger')->params;
        $this->logTo($params['default_logger']);
    }

    /**
     * Sends a log message to a special logger.
     *
     * @param string $type
     *
     *
     * @throws \Exception
     */
    public function logTo(string $type): void {
        $loggerContext = new LoggerContext($type);
        $loggerContext->sendByLogger($this->model->message, $type);
    }

    /**
     * Sends a log message to all loggers.
     */
    public function logToAll() {

    }
}