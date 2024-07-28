<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = CommonActionLabelEnum::CREATE." ". AppVocabularySearch::getValueByKey('Role');
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create box box-primary">

    <div class="box-body">
	
    <?= $this->render('_form-role', [
        'model' => $model,
    ]) ?>
	</div>
</div>
