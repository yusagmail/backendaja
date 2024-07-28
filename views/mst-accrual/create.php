<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\MstAccrual */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Mst Accrual');
$this->params['breadcrumbs'][] = ['label' => 'Mst Accruals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="mst-accrual-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
