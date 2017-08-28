<?php

use \yii\web\Request;
use \yii\web\View;

$baseUrl = str_replace ( '/frontend/web', '', (new Request())->getBaseUrl() );
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
        		'baseUrl' => $baseUrl,
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
    		
    		'authClientCollection' => [
    				'class' => 'yii\authclient\Collection',
    				'clients' => [
    						'facebook' => [
    								'class' => 'yii\authclient\clients\Facebook',
    								'clientId' => '775649419281112',
    								'clientSecret' => '9d053695f7e9124fa51aa1b9bf8ff93b',
    						],
    				],
    		],
    		'urlManager' => [
    				'baseUrl' => $baseUrl,
    				'enablePrettyUrl' => true,
    				'showScriptName' => false,
    				'enableStrictParsing' => false,
    				//'suffix' => '.html',
    				'rules' => [
    						'home' => '/site/index',
    						'about' => '/site/about',
    						'login' => '/site/login',
    						'logout' => '/site/logout',
    						///'mySecret' => '/work/create',
    		
    						'<controller>/<id:\d+>' => '<controller>/view',
    						'<controller:(course|courseonsemester)>/update/<id:\d+>' => '<controller>/update',
    						'courseonsemester/admin/<time:\d+>' => 'courseonsemester/admin',
    				]
    		],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
