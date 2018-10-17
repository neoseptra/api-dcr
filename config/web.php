<?php
$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '__Chkr7Dua_bwrl_Eagru94qbc30Brht',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession'=>false,
            'loginUrl'=>null,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'dbapi' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=eretrib_db',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'dbdata' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;port=5432;dbname=spse_lat', 
            'username' => 'postgres',
            'password' => 'idea5158',
            'charset' => 'utf8',
            'schemaMap' => [
              'pgsql'=> [
                'class'=>'yii\db\pgsql\Schema',
                'defaultSchema' => 'public' //specify your schema here
                ]
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null) {
                    $response->data = [
                    'success' => $response->isSuccessful,
                    'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                'GET '=>'site/index',
                'POST auth/login'=>'auth/login',
                'GET' =>'lelangall',
                [
                    'class'=>'yii\rest\UrlRule', 
                    'controller' => ['lelangall'=>'lelangall']
                ],
                [
                    'class'=>'yii\rest\UrlRule', 
                    'controller' => ['lelangmenang'=>'lelangmenang']
                ]

            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;