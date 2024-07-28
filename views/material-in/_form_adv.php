<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */
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

<?php
$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/plugins/fancybox/jquery.fancybox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php
$this->registerJs(
    '  
    $(".various").fancybox({
        maxWidth    : 1200,
        maxHeight   : 700,
        fitToView   : true,
        width        : 600,
        height        : 300,
        // height       : "70%",
        autoSize    : false,
        closeClick  : false,
        openEffect  : "none",
        closeEffect : "none"
    });
        '
);
?>

<div class="material-in-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            
            'horizontalCssClasses' => [
                'label' => 'col-lg-12',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-8',
            ],
            
            'template' => '
                <div class="col-sm-4">{label}</div>
                <div class="col-sm-8">{input}{error}</div>
               ',
        ],
    ]);  ?>

    <?php //= $form->field($model, 'id_unit_poduksi')->textInput() ?>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">


        <?php 
        //echo Yii::$app->request->referrer;
        //= $form->field($model, 'id_material')->textInput() ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Material::find()->orderBy([
            'nama' => SORT_ASC
            ])->
            asArray()->all(), 'id_material', 'nama');
        ?>

        <?php
        $buttonAdd =  Html::a(
                            '<i class="fa fa-fw fa-plus"></i>',
                            ['material/create', ],
                            ['class' => 'btn btn-warning  btn-block various fancybox.ajax']

                        );
        ?>

        <?= $form->field($model, 'id_material',
            [ 
                'template' => '
                <div class="col-lg-4">{label}</div>
                <div class="col-sm-6">{input}{error}</div>
                <div class="col-sm-2">'.$buttonAdd.'</div>' , 
            ]
            )->dropDownList(
            $listMaterial,
            ['prompt' => 'Pilih Material ...']
        ); ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listMaterialKategori1 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori1::find()->orderBy([
            'nama' => SORT_ASC
            ])->
            asArray()->all(), 'id_material', 'nama');
        ?>

        <?php
        $buttonAdd2 =  Html::a(
                            '<i class="fa fa-fw fa-plus"></i>',
                            ['material-kategori1/create', ],
                            ['class' => 'btn btn-warning  btn-block various fancybox.ajax']

                        );
        ?>

        <?= $form->field($model, 'id_material_kategori1',
            [ 
                'template' => '
                <div class="col-lg-4">{label}</div>
                <div class="col-sm-6">{input}{error}</div>
                <div class="col-sm-2">'.$buttonAdd2.'</div>' , 
            ]
            )->dropDownList(
            $listMaterialKategori1,
            ['prompt' => 'Pilih Kategori ...']
        ); ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listMaterialKategori2 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori2::find()->orderBy([
            'nama' => SORT_ASC
            ])->
            asArray()->all(), 'id_material', 'nama');
        ?>
        <?php
        $buttonAdd3 =  Html::a(
                            '<i class="fa fa-fw fa-plus"></i>',
                            ['material-kategori2/create', ],
                            ['class' => 'btn btn-warning  btn-block various fancybox.ajax']

                        );
        ?>
        <?= $form->field($model, 'id_material_kategori2',
            [ 
                'template' => '
                <div class="col-lg-4">{label}</div>
                <div class="col-sm-6">{input}{error}</div>
                <div class="col-sm-2">'.$buttonAdd3.'</div>' , 
            ]
            )->dropDownList(
            $listMaterialKategori2,
            ['prompt' => 'Pilih Kategori ...']
        ); ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listMaterialKategori3 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori3::find()->orderBy([
            'nama' => SORT_ASC
            ])->
            asArray()->all(), 'id_material', 'nama');
        ?>

        <?php
        $buttonAdd4 =  Html::a(
                            '<i class="fa fa-fw fa-plus"></i>',
                            ['material-kategori3/create', ],
                            ['class' => 'btn btn-warning  btn-block various fancybox.ajax']

                        );
        ?>

        <?= $form->field($model, 'id_material_kategori3',
            [ 
                'template' => '
                <div class="col-lg-4">{label}</div>
                <div class="col-sm-6">{input}{error}</div>
                <div class="col-sm-2">'.$buttonAdd4.'</div>' , 
            ]
            )->dropDownList(
            $listMaterialKategori3,
            ['prompt' => 'Pilih Kategori ...']
        ); ?>

        <?php //= $form->field($model, 'varian')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php //= $form->field($model, 'tanggal_proses')->textInput() ?>
        <?php
        //Mengambil list dari tabel sebelah (unit_produksi)
        $listUnitProduksi = \yii\helpers\ArrayHelper::map(\backend\models\UnitProduksi::find()->orderBy([
            'nama_unit' => SORT_ASC
            ])->
            asArray()->all(), 'id_unit_produksi', 'nama_unit');
        ?>

        <?= $form->field($model, 'id_unit_poduksi')->dropDownList(
            $listUnitProduksi,
        ); ?>
        <?php
        echo $form->field($model, 'tanggal_proses')->widget(datepicker::className(),[
                                'model' => $model,
                                'attribute' => 'date',
                                'template' => '{addon}{input}',
                                'options'=>['readonly'=>'readonly'],
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                    'endDate' =>date('Y-m-d'),
                                ]
                            ]);
        ?>

        <?= $form->field($model, 'catatan')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
    <h4>Surat Jalan</h4>
    <?= $form->field($model, 'nomor_surat_jalan')->textInput(['maxlength' => true]) ?>
    <?php
    /*
    echo $form->field ($model , 'nomor_surat_jalan' , 
        [ 
            'template' => '
            <div class="col-sm-2">{label}</div>
            <div class="col-sm-4">{input}{error}</div>
            <div class="col-sm-4">'.$buttonAdd.'</div>' , 

        ]
    )->textInput ( [ 'maxlength' => true ] )->label ( null , [ 'class' => 'control-label' ] )
    */
    ?>
    <?php
    //Mengambil list dari tabel sebelah (unit_produksi)
    $listSupplier = \yii\helpers\ArrayHelper::map(\backend\models\Supplier::find()->orderBy([
        'name_company' => SORT_ASC
        ])->
        asArray()->all(), 'id_supplier', 'name_company');
    ?>

    <?= $form->field($model, 'id_supplier')->dropDownList(
        $listSupplier,
    ); ?>
    <?php
    echo $form->field($model, 'tanggal_surat_jalan')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);
    ?>
    <?= $form->field($model, 'harga_beli_peryard')->textInput(['maxlength' => true]) ?>
    </div>
 </div>


    <?php //= $form->field($model, 'created_id_user')->textInput() ?>

    <?php //= $form->field($model, 'created_date')->textInput() ?>

    <?php //= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
