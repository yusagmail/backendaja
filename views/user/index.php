<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data User / Pengguna System';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php
/*
$listRole = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\common\modules\auth\models\AuthItem::find()
            ->where(["type" => 1])
            ->asArray()->all(), 'name', 'name'); */
$listRole = \backend\models\User::getListRoleLevel();
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?php //= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success btn-flat']) ?>

        <div class="btn-group">
        <button type="button" class="btn btn-success">Pengguna System</button>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <?php
            $models = \common\modules\auth\models\AuthItem::find()
                ->where(["type" => 1])
                //->orderBy(['id_asset_master'=>SORT_ASC, 'number1'=>SORT_ASC])
                ->all();

                foreach($models as $model){
                    $rolename = \backend\models\AuthRoleName::find()->where(['auth_item_name' => $model->name])->one();
                    if($rolename != null){
                        $label = $rolename->role_name;

                        if($rolename->is_active == 1){
                            $url_menu = Url::toRoute(['create-by-role', 'i'=>$model->name]);
                            if($model->name == "sales"){
                                $url_menu = Url::toRoute(['create-role-sales', 'i'=>$model->name]);
                            }

                            if($model->name == "warehouse"){
                                $url_menu = Url::toRoute(['create-role-warehouse', 'i'=>$model->name]);
                            }

                            echo '<li><a href="'.$url_menu.'">'.$label.'</a></li>';
                        }
                    }else{
                        $label = "*".$model->name;
                    }

                    //<li><a href="#">Action</a></li>
                    //<li class="divider"></li>
                }
            ?>

        </ul>
        </div>
    </div>

    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'full_name',
                'username',
                'email:email',
//                'password_hash',
                // 'auth_key',
				//'user_level',
                /*
                [
                    'attribute' => 'user_level',
                    'filter'=>Html::activeDropDownList($searchModel, 'user_level', $listRole, ['class' => 'form-control']),
                ],
                */
                [
                    'attribute' => 'user_level',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        return $data->userLevel;
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'user_level', $listRole, ['class' => 'form-control', 'prompt' => '-User Level-']),
                ],
                [
                    'label' => 'Keterangan',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'contentOptions' => ['style' => 'width: 200px;'],
                    'value' => function ($data) {
                        if($data->user_level == "sales"){
                            if (isset($data->outletPenjualanInduk)) {
                                $ret = "OUTLET : ".$data->outletPenjualanInduk->nama_outlet;
                                $ret .= '<br>';
                                $ret .= Html::a(
                                    '<i class="fa fa-fw fa-pencil"></i> Edit',
                                    ['user/update-role-sales', 'i' => $data->id],
                                    ['class' => 'btn btn-success btn-xs']
                                );
                                return $ret;
                            } else {
                                return "--";
                            }
                        }

                        if($data->user_level == "warehouse"){
                            if (isset($data->gudangInduk)) {
                                $ret = "GUDANG : ".$data->gudangInduk->nama_gudang;
                                $ret .= '<br>';
                                $ret .= Html::a(
                                    '<i class="fa fa-fw fa-pencil"></i> Edit',
                                    ['user/update-role-warehouse', 'i' => $data->id],
                                    ['class' => 'btn btn-info btn-xs']
                                );
                                return $ret;
                            } else {
                                return "--";
                            }
                        }

                        return "--";
                    },
                ],
				/*
                [
                    'label' => 'Role',
                    'value' => 'nameOfRole',
                ],
				*/
                /*
                [
                    'label' => 'Status',
                    'value' => 'nameOfStatus',
                ],
                */
                [
                    'label' => 'Reset Password',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id);
                        return Html::a(
                            '<i class="fa fa-fw fa-recycle"></i> Reset Pass',
                            ['user/reset-password', 'i' => $i],
                            ['class' => 'btn btn-warning btn-xs']
                        );
                    }
                ],
                // 'password_reset_token',
                
//                'role',

                // 'created_at',
                // 'updated_at',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 80px;'],
                ],
            ],
        ]); ?>
    </div>
</div>
