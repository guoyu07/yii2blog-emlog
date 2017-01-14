<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //关闭csrf
        'request' => [
            'enableCsrfValidation' => false,
        ],
    ],
];
