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
</head>


<?php
    $this->title = "QRIS - Pembayaran";

    //QRIS Sample Lengkap
    //https://qris.id/restapi/qris/show_qris.php?do=create-invoice&apikey=139139220222716&mID=195295220126&cliTrxAmount=3&cliTrxNumber=91123
?>

<?php
try{
            //use yii\httpclient\Client;
            //use yii\helpers\Json;
          $username = 'ttac';
          $password = 'ecf5402170fbf921561442198fca6b4a';
          $client = new \yii\httpclient\Client(['baseUrl' => 'https://qris.id/restapi/qris/show_qris.php?do=create-invoice&apikey=139139220222716&mID=195295220126&cliTrxAmount=3&cliTrxNumber=91123']);
          $response = $client->createRequest()
            //->setUrl('employee')
            ->setMethod('GET')
            ->setFormat(\yii\httpclient\Client::FORMAT_JSON)
            //->setUrl('news')
            // ->setUrl('pers')
            // ->setUrl($mode)
            //->setData(['user_id' => $username, 'password' => $password, 'page'=>1])
            ->addHeaders(['content-type' => 'application/json'])
            ->send();
          $datas = \yii\helpers\Json::decode($response->content);
          if ($response->isOk) {
            //$token = $response->data['token'];
          }

         //echo var_dump($datas);
          $number_news = 0;
          if(is_array($datas)){
            echo $datas['status'];
            if($datas['status'] == 'success'){
                $qris_content = $datas['data']['qris_content'];
                echo $qris_content;
            }else{
                $qris_status = $datas['data']['qris_status'];
            }
            /*
            foreach($datas as $key=>$val){
              //echo $key." ";
              //var_dump($val);
              //echo $val["qris_content"];
              //echo gettype($val);
              if(is_array($val)){
                foreach($val as $key2=>$val2){
                
                  if(is_array($val2)){
                    foreach($val2 as $key3=>$val3){
                      if(is_array($val3)){
                        //foreach($val3 as $key4=>$val4){
                          //echo $key4."<br>";
                          $url = isset($val3["url"]) ? $val3["url"] : '-';
                          $url = str_replace("/services/", "/new/", $url);
                          $title = isset($val3["title"]) ? $val3["title"] : '-';
                          $date = isset($val3["date"]) ? $val3["date"] : '-';
                          $number_news++;

                          echo '
                          <div class="border-bottom pb-3">
                            <h5 class="news-title mt-0 mb-0">
                              <a href="'.$url.'" target="_blank">'.$title.'</a>
                            </h5>
                              <p class="text-color m-0 d-flex align-items-center">
                                <span class="news-date mr-1">'.$date.'</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="news-date mr-1"></span>
                                <i class="mdi mdi-comment-outline"></i>
                              </p>
                          </div>
                          <hr>';

                          if($number_news >=$number_rows){
                            break;
                          }
                        //}
                      }
                    }
                  }
                }
              }

            }
            */
          }
        }catch (Exception $e) {
          echo "Error News API ke QRIS :".$e->getMessage();
        }
?>

<body>
    <div class="box box-body" >
        <div id='DivIdToPrint'>
        <center>
            <?php 
            $namaasset = $model->assetMaster->asset_name;
            $kodeasset = $model->number2;
            ?>
            <h1 style="font-size:14px; border: 0px"><?= $namaasset ?></h1>
            <h1 style="font-size:14px; border: 0px"><?= $kodeasset ?></h1>
            <?php

            use Da\QrCode\QrCode;

            $qrCode = (new QrCode($qris_content))
                ->setSize(250)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);
                //->useForegroundColor(51, 153, 255);


            // now we can display the qrcode in many ways
            // saving the result to a file:

            $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified

            // display directly to the browser 
            //header('Content-Type: '.$qrCode->getContentType());
            //echo $qrCode->writeString();

            ?> 

            <?php 
            // or even as data:uri url
            echo '<img src="' . $qrCode->writeDataUri() . '">';
            ?>
        </center>
        </div>
        <input type='button' id='btn' value='Print' class="btn btn-success" onclick='printDiv();'>
    </div>
    <script>
        function printDiv() {
            var divToPrint = document.getElementById('DivIdToPrint');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 10);
        }
    </script>
</body>

</html>