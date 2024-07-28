<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\Vendor */

$this->title = "Modal Tester";
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vendor-view box box-primary">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
<?php
    Modal::begin(
        [
            'id' => 'modal',
            'header' => 'Titik Persimpangan (Node)',
            'size' => 'modal-lg',
        ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
?>
    <div class="box-body">
    <p>
			<?php
			//$u = EncryptionDB::encryptor('encrypt', $model->id_link);
			$u = 12345;
			$url = yii\helpers\Url::to(['form-modal','u'=>$u]);
			echo $url."<br>";
			echo Html::button('<i class="fa fa-plus"></i> Tambah Titik Simpang ', [
		        'value'=>$url,
				'id' => 'modal',
                'class'=> 'btn btn-sm btn-success modalButton',
                ]);
			?>
    </p>
    </div>
</div>
