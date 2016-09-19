<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'homeUrl' => '/admin',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
    ],

    'language' => 'ru',
    'sourceLanguage' => 'en',

    'modules' => [
        'articles' => [
            'class' => 'bl\articles\backend\Module'
        ],
        'languages' => [
            'class' => 'bl\cms\language\Module'
        ],
        'redirect' => [
            'class' => 'bl\cms\redirect\Module'
        ],
        'seo' => [
            'class' => 'bl\cms\seo\backend\Module'
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableRegistration' => false,
            'admins' => ['admin'],
            'as backend' => [
                'class' => 'dektrium\user\filters\BackendFilter',
                'only' => ['register'], // Block View Register Backend
            ],
        ]
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'uk',
                    'fileMap' => [
                        'shop' => 'shop.php'
                    ],
                ],
            ],
        ],
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name'     => '_backendIdentity',
                'path'     => '/admin',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            'name' => 'BACKENDSESSID',
            'cookieParams' => [
                'httpOnly' => true,
                'path'     => '/admin',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'bl\multilang\MultiLangUrlManager',
            'baseUrl' => '/admin',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];