<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/site.css',
        'fonts/font-awesome-4.7.0/css/font-awesome.min.css',

    ];

	public $js = [
		'plugins/input_mask/jquery.inputmask.js',
        'plugins/input_number/jquery.number.min.js',
	];

	public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
		'dmstr\web\AdminLteAsset',

	];
}
