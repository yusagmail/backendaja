<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemEventParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Item Event Participant';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body asset-item-event-participant-index">

        
        <p>
            <?= Html::a('Tambah Asset Item Event Participant', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'participant_type',
            'participant_name',
            'participant_affiliation',
            'participant_phone',
            'participant_email:email',
            //'participant_position',
            //'is_confirm_present',
            //'is_present',
            //'checkin_time',
            //'checkout_time',
            //'has_print_certificate',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
