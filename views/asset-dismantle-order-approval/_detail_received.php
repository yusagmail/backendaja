<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */

\yii\web\YiiAsset::register($this);
?>
<div class="box2">
    <div class="box-body2 asset-dismantle-received-view">


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'received_date',
            'notes',
            'is_approved',
            'approval_user_id',
            //'approval_date',
            //'approval_ip_address',
            ],
        ]) ?>

    </div>
</div>
