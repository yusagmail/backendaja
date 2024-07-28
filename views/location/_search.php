<?php

use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Location;
use backend\models\Propinsi;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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
<div class="box box-success by-location-search">
	<div class="box-header with-border">
	  <h3 class="box-title">Filter Pencarian</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<?php /*
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		*/ ?>
	  </div>
	</div>
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['location'],
            'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-8',
                ],
            ],
        ]);
        ?>

        <?php $dataListAssetMaster = ArrayHelper::map(Location::find()->asArray()->all(), 'id_location', 'location_name');
        echo $form->field($model, 'id_location')->widget(Select2::classname(), [
            'data' => $dataListAssetMaster,
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => [
                'prompt' => 'Pilih Span Tower']
        ])->label("Span Tower");
        ?>
        <?php $dataListAssetMaster = ArrayHelper::map(Location::find()->asArray()->all(), 'address', 'address');
        echo $form->field($model, 'address')->widget(Select2::classname(), [
            'data' => $dataListAssetMaster,
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => [
                'prompt' => 'Pilih Alamat']
        ])->label("Alamat");
        ?>
        <?php $dataKabupaten = ArrayHelper::map(Propinsi::find()->asArray()->all(), 'id_propinsi', 'nama_propinsi');
        echo $form->field($model, 'id_propinsi')->widget(Select2::classname(), [
            'data' => $dataKabupaten,
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => [
                'prompt' => 'Pilih propinsi',
                'onchange' => '
            $.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/lists?id=') . '"+$(this).val(), function( data ) {
            $( "select#assetitemsearch-id_kabupaten" ).html( data );
            });

    ']
        ])->label("Propinsi");
        ?>
        <?php $dataKabupaten = ArrayHelper::map(Kabupaten::find()->asArray()->all(), 'id_kabupaten', 'nama_kabupaten');
        echo $form->field($model, 'id_kabupaten')->widget(Select2::classname(), [
            'data' => $dataKabupaten,
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => [
                'prompt' => 'Pilih Kabupaten',
                'onchange' => '
            $.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/kecamatan?id=') . '"+$(this).val(), function( data ) {
            $( "select#assetitemsearch-id_kecamatan" ).html( data );
            });

    ']
        ])->label("Kabupaten");
        ?>

        <?php $dataKecamatan = ArrayHelper::map(Kecamatan::find()->asArray()->all(), 'id_kecamatan', 'nama_kecamatan');
        echo $form->field($model, 'id_kecamatan')->widget(Select2::classname(), [
            'data' => $dataKecamatan,
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => [
                'prompt' => 'Pilih Kecamatan ...',
                'onchange' => '
            $.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/kelurahan?id=') . '"+$(this).val(), function( data ) {
            $( "select#assetitemsearch-id_kelurahan" ).html( data );
            });

    ']
        ])->label("Kecamatan");
        ?>

        <?php $dataKelurahan = ArrayHelper::map(Kelurahan::find()->asArray()->all(), 'id_kelurahan', 'nama_kelurahan');
        echo $form->field($model, 'id_kelurahan')->widget(Select2::classname(), [
            'data' => $dataKelurahan,
            'options' => ['placeholder' => 'Pilih Kelurahan ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Kelurahan");
        ?>
        <div class="box-footer clearfix">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

