<?php

use common\labeling\CustomLabel;
use common\uicomponent\AlertUI;
use backend\models\AppVocabularySearch;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceived */

$this->title = AppVocabularySearch::getValueByKey('Penomoran Aset');;
$this->params['breadcrumbs'][] = ['label' => 'Asset Received', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-received-view box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-header with-border">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id_asset_received',
                [
                    'attribute' => 'assetMaster.asset_name',
                ],
                //'number1',
                [
                    'attribute' => 'received_date',
                    'format'=>['Date','php:d-M-Y']
                ],
                //'received_year',
                'price_received',
                'quantity',
                [
                    'attribute' => 'statusReceived.status_received',
                ],
            ],
        ]) ?>

    </div>
</div>

<?php
	if($model->quantity > 0){
?>

	<?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		//'action' => ['index1'],
		//'method' => 'get',
		'fieldConfig' => [
			'horizontalCssClasses' => [
				'label' => 'col-sm-2',
				'offset' => 'col-sm-offset-2',
				'wrapper' => 'col-sm-8',
			],
		],
	]); ?>



<div class="asset-received-view box box-success">
    <div class="box-header with-border">
        <div class="box-body">
            <div class="col-md-4">
                <div class="form-group">

                    <?php
                    $a=1;
                    while ($a<= $model->quantity)
                    {
                        echo  " <label>Nomor Investasi</label><input type='text' class='form-control' name='<?php echo $a; ?>'><br>";
                        $a++;
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" >
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success','style'=>'margin-top: 18px;']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
	}else{
		$alert = CustomLabel::msgQuantityNotZero();
		echo AlertUI::alertDangerMode1($alert);
	}
?>