<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CpanelLeftmenu */

$this->title = 'Detail Auth Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menu Auth Aplikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
    $listRole = \backend\models\User::getActiveListRoleLevel();
?>

<div class="cpanel-leftmenu-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_leftmenu',
                //'id_parent_leftmenu',
                //'has_child',
                'menu_name',
                [
                    'label' => 'Menu Utama?',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if($data->id_parent_leftmenu == 0){
                            return "PARENT";
                        }else{
                            return "CHILD";
                        }
                    },

                ],
                //'menu_icon',
                //'value_indo',
                //'value_eng',
                //'url:url',
                //'is_public',
                //'auth:ntext',
                [
                    'label' => 'auth',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use ($listRole){
                        return $data->getAuthAlias($listRole);
                    
                    }
                ],
                //'mobile_display',
                //'visible',
            ],
        ]) ?>
    </div>
</div>
