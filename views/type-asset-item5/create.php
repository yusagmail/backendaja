<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem5 */

$this->title = CommonActionLabelEnum::CREATE.' Type Asset Item 5';
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' Type Asset Item 5', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset-item5-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
