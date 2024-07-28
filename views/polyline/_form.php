<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Polyline */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="point-form" style="margin-left: 15px">
    <?php if ($action == "create") {
        $action = ['save-create'];
    }
    if ($action == "update") {
        $action = ['save-update'];
    }
    ?>
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-submit',
        'action' => $action,
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-6',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-6',
            ],
        ],
    ]); ?>
    <?= $form->field($model, 'id_polyline')->hiddenInput(['maxlength' => true])->label(false); ?>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'display_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <!-- DATA YANG BELUM TAU MAPPINGNYA -->
    <!-- <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'draw_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ts')->textInput() ?>

    <?= $form->field($model, 'modified_ts')->textInput() ?>

    <?= $form->field($model, 'deleted_ts')->textInput() ?> -->

    <?php $searchModel = new \backend\models\PolylinePointSearch();
    //echo "ID_Reff:".$model->id_polyline;
    $searchModel->id_polyline = -1; //$model->id_polyline;
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?> <?= $this->render('_list_point', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'action' => 'create'
            ]) ?>
    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function updateGridListPoint(id) {
        $("#alertMsg").html("Please wait loading ..");
        console.log("update grid");
        if (id > 0) {
            document.body.style.cursor = 'wait';
            $.post("<?= Yii::$app->urlManager->createUrl('polyline/update-list-point/') ?>", {
                id_polyline: id
            }, function(data, status) {
                //const obj = JSON.parse(data);
                //$("#list_point").html("Hello World");
                //$("#mydiv3 #add-form #list_point").html("Hello World");
                // $("#mydiv3 #list_point").html("Hello Worldss");
                //$("#mydiv3 #update-form #form-submit #list_point").html("Hello Worldsasa");
                $("#mydiv3 #update-form #form-submit #list_point").html(data);
                //$("#add-form #form-submit #list_point").html("Hellos World");
                //$("#list_point_all").html("Hello World");
                //$("#list_point").html(data);

                //console.log(data);
                console.log("done");
                //console.log(obj.name);
            });
        } else {
            //$( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
        }

    }

    function updateGridListPointAdd(id) {
        $("#alertMsg").html("Please wait loading ..");

        if (id > 0) {
            document.body.style.cursor = 'wait';
            $.post(
                "<?= Yii::$app->urlManager->createUrl('polyline/update-list-point/') ?>",
                { id_polyline: id },
                function (data, status) {
                    $("#mydiv2 #add-form #form-submit #list_point").html(data);
                    console.log("done");
                }
            )
            .fail(function (error) {
                console.log("Error:", error.responseText);
                // Handle error di sini
            });
        } else {
            //$( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
        }

    }
</script>

<script>
    //Jika : After pjax reload, script tidak jalan
    //Solusi : https://forum.yiiframework.com/t/scripts-not-working-after-pjax-reload-container/82327/8
    $(document).ready(function() {
        $('#list_point').on('click', 'button[data-childpointid]', function() {
            var id = $(this).data('childpointid');
            console.log(" delete id:" + id);
            // Kirim data melalui Ajax
            const response = confirm("Are you sure delete this point item?")
            if (response) {
                $("#alertMsg").html("Please wait loading ..");
                $.ajax({
                    url: "<?= Yii::$app->urlManager->createUrl(['polyline/delete-point']) ?>",
                    method: 'POST',
                    data: {
                        id: id,

                    },
                    success: function(response) {
                        console.log(response); // Tampilkan respons di console
                        $.pjax.reload({
                            container: '#pjax_id_point',
                            async: false
                        });
                        // Lakukan sesuatu setelah data berhasil dikirim
                        updateGridListPointAdd(id_primary_add);
                        console.log("reload after delete");
                        loadSinglePoly();
                        $("#alertMsg").html("");
                        document.body.style.cursor = 'default';
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                        // Tangani kesalahan jika terjadi

                    }
                });
            }
        });

        $('#list_point').on('click', 'button[data-childup]', function(event) {
            event.preventDefault();

            // Menghentikan penyebaran event lebih jauh
            event.stopPropagation();
            var id = $(this).data('childup');
            console.log("up id:" + id);
            const response = confirm("Are you sure want to up this point item?")
            if (response) {
                $("#alertMsg").html("Please wait loading ..");
                $.ajax({
                    url: "<?= Yii::$app->urlManager->createUrl(['polyline/swap-point']) ?>",
                    method: 'POST',
                    data: {
                        id: id,
                        mode: 'up',
                    },
                    success: function(response) {
                        console.log(response); // Tampilkan respons di console
                        $.pjax.reload({
                            container: '#pjax_id_point',
                            async: false
                        });
                        // Lakukan sesuatu setelah data berhasil dikirim
                        updateGridListPointAdd(id_primary_add);
                        console.log("reload after delete");
                        loadSinglePoly();
                        $("#alertMsg").html("");
                        document.body.style.cursor = 'default';
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                        // Tangani kesalahan jika terjadi
                    }
                });
            }
        });

        var isHandlingClick = false;

        $('#list_point').on('click', 'button[data-childdown]', function(event) {
            event.preventDefault();

            // Menghentikan penyebaran event lebih jauh
            event.stopPropagation();
            var id = $(this).data('childdown');
            console.log("down id:" + id);
            $("#alertMsg").html("Please wait loading ..");
            $.ajax({
                url: "<?= Yii::$app->urlManager->createUrl(['polyline/swap-point']) ?>",
                method: 'POST',
                data: {
                    id: id,
                    mode: 'down',
                },
                success: function(response) {
                    console.log(response); // Tampilkan respons di console
                    $.pjax.reload({
                        container: '#pjax_id_point',
                        async: false
                    });
                    // Lakukan sesuatu setelah data berhasil dikirim
                    updateGridListPointAdd(id_primary_add);
                    console.log("reload after delete");
                    loadSinglePoly();
                    $("#alertMsg").html("");
                    document.body.style.cursor = 'default';
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
        });
    });
</script>