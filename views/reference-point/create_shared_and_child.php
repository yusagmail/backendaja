<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ReferencePoint */

$this->title = 'Add Reference Point';
$this->params['breadcrumbs'][] = ['label' => 'Reference Point', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding: 6px;" id="add-form">
	<div class="box-body reference-point-create">

		
	    <?= $this->render('_form_shared_and_child', [
	        'model' => $model,
	        'action' => 'create'
	    ]) ?>

	</div>
</div>


<?php
$this->registerJs(
    "
$('#form-submit-reference-point-and-child').on('beforeSubmit', function(e) {

    var form = $(this);

    var formData = form.serializeArray();
    console.log('ini yang mau dikirim : '+id_primary_add);
    formData.push({name: 'id_primary_add', value: id_primary_add});
    formData = $.param(formData);
    $.ajax({
        url: form.attr(\"action\"),
        type: form.attr(\"method\"),
        data: formData,
        success: function (data) {
            alert('Success post : ' + data);
            $.pjax.reload({container: '#pjax_id_point', async: false});
            focusToNewPointAndChild();
        },

        error: function () {
            alert('Something went wrong');
        }

    });

}).on('submit', function(e){
    e.preventDefault();
});
");
?>
<?php
$this->registerJs(
    "
    function focusToNewPointAndChild() {
        var lat = $('#add-form #referencepoint-latitude').val();
        var long = $('#add-form #referencepoint-longitude').val();
        

        //clearMainMap();
        //loadMainData();
        resetSinglePolyFile(0);
        //Load Reference Point
        clearMainMap();

        updateGridListPointAdd(id_primary_add);
        console.log('end');
        loadSinglePoly();

        clearLayerDataReferencePoint();
        loadDataReferencePoint();
        console.log('zoom to new part');
        map.flyTo({
        //center: [(Math.random() - 0.5) * 360, (Math.random() - 0.5) * 100],
            center: [long, lat],
            zoom: 11,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
    }
");
?>
