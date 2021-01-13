<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'modules' => [
		'datecontrol' =>  [
			'class' => '\kartik\datecontrol\Module'
			],
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
			],
	],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'algo' => [
			'class' => 'common\components\AlgoFunction',
		],
    ],
];
