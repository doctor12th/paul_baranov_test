<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'logger',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@logger' => '@app/modules/logger',
    ],
    'components' => [
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
    ],
    'params' => $params,
];

return $config;