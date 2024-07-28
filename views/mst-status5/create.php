<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatus1 */
$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Mst Status5');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Mst Status5'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-status1-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
