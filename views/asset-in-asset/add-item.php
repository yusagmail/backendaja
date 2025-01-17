<?php

use yii\helpers\Html;
use backend\models\AppFieldConfigSearch;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Inventarisasi Aset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey('Inventarisasi Aset'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset1-create">

    <?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form-add-item', [
        'model' => $model,
		'varian_group' =>$varian_group
    ]) ?>

</div>
