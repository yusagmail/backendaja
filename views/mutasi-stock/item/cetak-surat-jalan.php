<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPlo */

//$this->title = $model->id_nilai_plo;
$this->title = 'SKPI';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Plo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<head>
    <title></title>
    <style>
        html, body, p{
            margin: 0;
            padding: 0;
            /*
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif!important; */
            font-size: 18px;
        }
        body, p{
            padding-right: 6px;
        }
        table{
            border-collapse: collapse;
            font-size: 12px;
        }
        td,th{
            padding: 4px 2px;
        }
        table tr th{
            background-color: #3c8dbc;
            color: white;
            -webkit-print-color-adjust: exact;
        }
        #grid-pembayaran tr th{
            background-color: #b5b5b5;
            -webkit-print-color-adjust: exact;
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Pacifico');
    </style>
</head>
<body onload="javascript:window.print()">
    <?= $this->render('_header', [
        'model' => $model,
    ]) ?>
    <table style="margin: 20px;">
        <tr>
            <td width="50%">
                asdas
            <td width="50%" style="margin-left: 60px">
                asdasd
            </td>
        </tr>

    </table>
    <?= $this->render('_footer', [
        'model' => $model,
    ]) ?>
</body>
</html>