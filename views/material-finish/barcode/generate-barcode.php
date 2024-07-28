Ini untuk generate barcode

<div id="showBarcode"></div>
<!--This eleme

<?php
$label = "Muhammad Fajri";

use barcode\barcode\BarcodeGenerator as BarcodeGenerator;

$optionsArray = array(
	'elementId' => 'showBarcode', /* div or canvas id*/
	'value' => $id_parent . '-' . $id_item, /* value for EAN 13 be careful to set right values for each barcode type */
	'type' => 'code39',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
);

echo BarcodeGenerator::widget($optionsArray);
?>