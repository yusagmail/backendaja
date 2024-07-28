<?php

use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Invoice styling -->
	<style>
		body {
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			text-align: left;
			color: #777;
			font-weight: bold;
		}

		body h1 {
			font-weight: 300;
			margin-bottom: 0px;
			padding-bottom: 0px;
			color: #000;
		}

		body h3 {
			font-weight: 300;
			margin-top: 10px;
			margin-bottom: 20px;
			font-style: italic;
			color: #555;
		}

		body a {
			color: #06f;
		}

		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
			border-collapse: collapse;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
			text-align: right;
		}

		.invoice-box table tr td:nth-child(1) {
			text-align: left;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}
	</style>
</head>


<?php
$this->title = "Cetak Invoice";

$nama_perusahaan = \backend\models\AppSettingSearch::getValueByKey("APP-NAME");
/*
function generateBarcodeEANOld($number)
{
  $code = '200' . str_pad($number, 9, '0');
  $weightflag = true;
  $sum = 0;
  // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
  // loop backwards to make the loop length-agnostic. The same basic functionality 
  // will work for codes of different lengths.
  for ($i = strlen($code) - 1; $i >= 0; $i--)
  {
    $sum += (int)$code[$i] * ($weightflag?3:1);
    $weightflag = !$weightflag;
  }
  $code .= (10 - ($sum % 10)) % 10;
  return $code;
}
*/
?>

<body>
	<div class="box box-body">
		<div id='DivIdToPrint'>
			<center>
				<div class="invoice-box">
					<table cellpadding="0" cellspacing="0">
						<tr class="top">
							<td colspan="5">
								<table width="100%" border="0">
									<td class="title" width="10%">
										<img src="<?= Yii::$app->request->baseUrl; ?>../../frontend/web/img/LOGO.jpg" style="width: 100%; max-width: 100px" />
									</td>
									<td style="text-align:left">
										<div style="font-size:24px"><?= $nama_perusahaan ?></div>
										<?= $model->outletPenjualan->alamat ?>
									</td>
								</table>
								<table width="100%" border="0">
									<td width="10%" style="text-align: center; font-size: 24px;">
										INVOICE
									</td>
								</table>
								<table width="100%" border="0">
									<tr>
										<!-- <td class="title" width="10%">
											<img src="<?= Yii::$app->request->baseUrl; ?>../../frontend/web/img/LOGO.jpg" style="width: 10%; max-width: 100px" />
										</td> -->
										<!-- <td align="left">Domivatex Lestari Abadi Jalan Sukabirus, Nanjung, Kec. Margaasih Bandung, Jawa Barat 40217, Indonesia</td> -->
									</tr>
									<tr>
										<td width="50%">
											No. Invoice : <?= $model->invoiceNumber ?><br />
											No. Surat Jalan : <?= $model->suratJalanNumber ?>
										</td>
										<!-- <td colspan="14"></td>
										<td colspan="14"></td> -->
										<td width="50%">
											<?= $model->outletPenjualan->kota ?>, <?= common\helpers\Timeanddate::getShortDateIndo($model->tanggal_order) ?><br />
											Kepada Yth. <?= $model->customer->nama_customer ?>
											<?php /**  $model->customer->nama_kontak */ ?><br />
											<?php /** $model->customer->nomor_telepon */ ?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						

						

						<!-- <tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>

				<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr> -->

						<tr class="heading">
							<td>Item</td>
							<td>Total Roll</td>
							<td>Total Yard</td>
							<td>Harga</td>
							<td>Total</td>
						</tr>

						<?php
						$data = $dataProvider->getModels();
						?>

						<?php foreach ($data as $item) { ?>
							<tr class="item">
								<td>
									<?= $item->mater->nama ?>
									<?php /*
									<?= $item->mater->nama ?> - <?= $item->materialKategori1->nama ?> - <?= $item->materialKategori3->nama ?>
									*/ ?>
									</td>
								<td><?= $item['jumlah'] ?></td>
								<td><?= $item->yard ?></td>
								<td> <?= \common\helpers\ContentStringManipulator::formatRp($item->sales_harga_jual) ?></td>
								<td> <?= \common\helpers\ContentStringManipulator::formatRp($item->yard * $item->sales_harga_jual) ?></td>
							</tr>
						<?php } ?>

						<tr class="total">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Total: <?= \common\helpers\ContentStringManipulator::formatRp($total) ?></td>
						</tr>
						<tr class="total">
							<td colspan="5">Terbilang : <i><?= ucwords(\common\helpers\CurrencyManipulator::terbilangRupiah($total)) ?> rupiah</i></td>
						</tr>
						<tr class="total">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="text-align:left">Hormat Kami,<Br><br><br><br><Br><Br></td>
						</tr>
					</table>
				</div>
			</center>
		</div>
		<!-- <input type='button' id='btn' value='Print' class="btn btn-success" onclick='printDiv();'> -->
	</div>
	<script>
		function printDiv() {
			// var divToPrint = document.getElementById('DivIdToPrint');
			// var newWin = window.open('', 'Print-Window');
			// newWin.document.open();
			// newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
			// newWin.document.close();
			// setTimeout(function() {
			//     newWin.close();
			// }, 10);

			var printContents = document.getElementById('DivIdToPrint').innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			setTimeout(() => {
				window.print();
			}, 1000);

			document.body.innerHTML = originalContents;
		}
		printDiv()
	</script>
</body>

</html>