<?php
//echo $supplier->id_type_of_supplier;
?>

<?php
    //$id_type_of_supplier =  $supplier->id_type_of_supplier;
    $step[1]["Info"]  = "Informasi Retur";
    $step[2]["Info"] = "Pilih Detail Item Barang";
    $step[3]["Info"] = "Rekap Retur";
    //$step[4]["Info"] = "Sustainability";
    //$step[5]["Info"] = "Identitas Responden";
?>
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <?php
                    //$step_ke = 2;
                    for($i=1;$i<=count($step);$i++){
                        $label = "active";
                        if($i > $step_ke){
                            $label = "disabled";
                        }
                        echo '
                        <li class="'.$label.'"><a href="#step-'.$i.'">
                            <h4 class="list-group-item-heading">Step '.$i.'</h4>
                            <p class="list-group-item-text">'.$step[$i]["Info"].'</p>
                        </a></li>                       
                        ';
                    }
                ?>
                <?php /*
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Koordinat</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Sertifikat</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Sustainability</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 5</h4>
                    <p class="list-group-item-text">Manajemen Mutu</p>
                </a></li>
                */ ?>
            </ul>
        </div>
    </div>