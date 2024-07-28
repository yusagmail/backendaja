<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form \yii\widgets\ActiveForm */

$this->title = 'Scan Asset Item';
$this->params['breadcrumbs'][] = ['label' => 'Scan Asset Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .button, button, input[type='button'], input[type='reset'], input[type='submit'] {
        background-color: #9b4dca;
        border: 0.1rem solid #9b4dca;
        border-radius: .4rem;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-size: 1.1rem;
        font-weight: 700;
        height: 3.8rem;
        letter-spacing: .1rem;
        line-height: 3.8rem;
        padding: 0 3.0rem;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        white-space: nowrap;
    }

    #scanned-QR{
        word-break: break-word;
    }

    #webcodecam-canvas, #scanned-img {
        background-color: #2d2d2d;
    }

</style>
<div class="scan-asset-item-form box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>

    <div class="box-header with-border">
        <?php //$form = ActiveForm::begin(); ?>
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
       <div id="QR-Code" class="container" style="width:100%">
            <div class="panel panel-primary">
                <div class="panel-heading" style="display: inline-block;width: 100%;">
                    <h4 style="width:50%;float:left;">Silahkan Scan Item</h4>
                    <div style="width:50%;float:right;margin-top: 5px;margin-bottom: 5px;text-align: right;">
                    <select id="camera-select" class="form-control" style="display: inline-block;width: auto;"></select>
                    <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button"
                            data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button"
                            data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button"
                            data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button"
                            data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button"
                            data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-6" style="text-align: center;">
                    <div class="well" style="position: relative;display: inline-block;">
                        <canvas id="webcodecam-canvas" width="320" height="240"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>

                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div id="result" class="thumbnail">
                        <div class="well" style="position: relative;display: inline-block;">
                            <img id="scanned-img" src="" width="320" height="240">
                        </div>
                        <div class="caption">
                            <h3>Scanned result</h3>
                            <p id="scanned-QR"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib-cam/qrcodelib.js"></script>
<script type="text/javascript" src="../lib-cam/webcodecamjs.js"></script>
<script type="text/javascript" src="../lib-cam/main.js"></script>
<script type="text/javascript" src="../lib-cam/filereader.js"></script>