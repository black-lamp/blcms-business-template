<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'homeUrl' => '/',
    'bootstrap' => [
        'log',
    ],

    'language' => 'ru',
    'sourceLanguage' => 'en',

    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'articles' => [
            'class' => 'bl\articles\frontend\Module'
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'dektrium\user\models\User',
            ],
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'uk',
                    'fileMap' => [
                        'shop' => 'shop.php'
                    ],
                ],
            ],
        ],
        'request' => [
            'baseUrl' => '/',
            'csrfParam' => '_csrf-frontend',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => 'google_client_id',
                    'clientSecret' => 'google_client_secret',
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => 'facebook_client_id',
                    'clientSecret' => 'facebook_client_secret',
                ],
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => 'vkontakte_client_id',
                    'clientSecret' => 'vkontakte_client_secret',
                ]
            ],
        ],
        'user' => [
            'identityCookie' => [
                'name'     => '_frontendIdentity',
                'path'     => '/',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            'name' => 'FRONTENDSESSID',
            'cookieParams' => [
                'httpOnly' => true,
                'path'     => '/',
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
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'cache' => null,
            'rules' => [
                [
                    'class' => 'bl\articles\UrlRule',
                    //'prefix' => 'articles/'
                ],
            ],
        ],
        'view' => [
        ],
    ],
    'params' => $params,
];