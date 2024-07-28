<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemEventParticipant */

//$this->title = $model->id_asset_item_event_participant;
$this->title = 'Detail '.'Asset Item Event Participant';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Event Participant', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-item-event-participant-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_event_participant], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_event_participant], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'participant_type',
            'participant_name',
            'participant_affiliation',
            'participant_phone',
            'participant_email:email',
            'participant_position',
            'is_confirm_present',
            'is_present',
            'checkin_time',
            'checkout_time',
            'has_print_certificate',
            ],
        ]) ?>

    </div>
</div>
