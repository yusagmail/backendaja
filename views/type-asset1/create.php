<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$this->title = CommonActionLabelEnum::CREATE." ". AppVocabularySearch::getValueByKey('Type Asset 1');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST." ". AppVocabularySearch::getValueByKey('Type Asset 1'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body type-asset1-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
