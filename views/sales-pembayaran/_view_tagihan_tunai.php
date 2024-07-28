<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

\yii\web\YiiAsset::register($this);

$sisa_tagihan = $model->invoice_total - $model->bayar_uang_muka;

?>
        <div class="row">
            <div class="col-md-6 col-sm-3 col-xs-12">
                <h4 class="text-right">TOTAL TAGIHAN</h4>
            </div>
            <div class="col-md-6 col-sm-3 col-xs-12">
            <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($model->invoice_total) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
            </div>
        </div>


<?php /*
                <?= DetailView::widget([
                    'model' => $model,
                    
                    'attributes' => [
                        //'tanggal_order',

                        'invoice_total',
                        //'nomor',
                        //'month',
                        //'year',
                    ],
                ]) ?>
*/ 


