<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

use yii\web\Request;

$baseUrl = str_replace('/backend/web', '/administrator', (new Request)->getBaseUrl());
$baseFrontUrl = ('/frontend/web');
return [
    'name' => 'ASSET',
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'homeUrl' => $baseUrl,
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'right-menu',
            'menus' => [
                'user' => null, // disable menu
            ],
            'mainLayout' => '@app/views/layouts/main.php',
            'viewPath' => '@app/views/mdmadmin',
        ],
        'gridview' => ['class' => 'kartik\grid\Module'],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'authTimeout' => 3600, // 1 jam
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
            'class' => 'yii\web\UrlManager',
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

            ]
        ],
		'urlManagerFrontend' => [
			'class' => 'yii\web\urlManager',
			//'baseUrl' => '/frontend/web',
			//'baseUrl' => $baseFrontUrl,
			'baseUrl' => '@web/../',
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
    ],
    'params' => $params,
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/logout',
//            'site/*', // tambahkan action-action yg lain di sini
            'admin/*',
        ]
    ],


    'timeZone' => 'Asia/Jakarta',
];
