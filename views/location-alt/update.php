<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem1 */

$this->title = CommonActionLabelEnum::UPDATE." ". $mainLabel;
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST." ". $mainLabel, 'url' => ['index']];
?>
<div class="box">
	<div class="box-body type-asset1-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
