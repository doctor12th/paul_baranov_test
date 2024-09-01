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

            return $this->render('@logger/views/logger/logger-result', ['model' => $this->model]);
        }
        return $this->render('@logger/views/logger/logger', ['model' => $this->model]);
    }

    /**
     * Sends a log message to the default logger.
     */
    public function log()
    {
        $params = Yii::$app->getModule('logger')->params;
        $this->logTo($params['default_logger']);
    }

    /**
    * Sends a log message to a special logger.
    *
    * @param string $type
    */
    public function logTo(string $type)
    {

    }

    /**
     * Sends a log message to all loggers.
     */
    public function actionLogToAll()
    {

    }
}