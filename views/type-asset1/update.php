<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem1 */

$this->title = CommonActionLabelEnum::UPDATE." ". AppVocabularySearch::getValueByKey('Type Asset 1');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST." ". AppVocabularySearch::getValueByKey('Type Asset 1'), 'url' => ['index']];
?>
<div class="box">
	<div class="box-body type-asset1-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
