<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Gudang */

//$this->title = $model->id_gudang;
$this->title = 'Barcode Double?';
$this->params['breadcrumbs'][] = ['label' => 'home', 'url' => ['double-barcode']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body">


        <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-question"></i>

              <h3 class="box-title">Problem Barcode Yang Double?</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
                <dt>Mengapa bisa terjadi?</dt>
                <dd>Generator barcode menggunakan library versi 1 (versi sebelumnya). Salah satu kelemahan library versi 1  adalah "filling zero in the right"<br>
                Contoh : <br>
                Produk id 3 akan digenerate dengan 2003000001<br>
                Produk id 30 akan digenerate dengan 2003000001<br>
                Produk id 300 akan digenerate dengan 2003000001<br>
                Produk id 3000 akan digenerate dengan 2003000001<br>
                dan seterusnya<Br>
                dengan demikian akan muncul produk id berbeda tetapi dengan kode yang sama<br>

                Jadi jumlah duplikasi barcode akan muncul sampai dengan digit 5-6 di belakang.

                </dd>
                <hr>
                <dt>Solusi Terhadap Double Barcode yang sudah digenerate.</dt>
                <dd>Pada transaksi yang terjadi double barcode akan dibuat pilihan agar pengguna dapat memilih produk mana yang akan dimasukkan (Solusi terhadap eksisting barcode).</dd>
                <hr>
                <dt>Solusi Jangka Panjang</dt>
                <dd>Untuk solusi jangka panjang, telah dibuatkan generator library versi 2 (versi baru) per tanggal 15 November 2021. 
                <?php
                $organizationNumber = Yii::$app->params['organization-kode'];
                ?>
                Fitur ini memperbaiki dari generasi sebelumnya dan akan ditandai dengan kode "<?= $organizationNumber ?>" di bagian depan
                </dd>
              </dl>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
