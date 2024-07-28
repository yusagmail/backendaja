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

		
	    <?= $this->render('_form', [
	        'model' => $model,
	        'action' => 'create'
	    ]) ?>

	</div>
</div>


<?php
$this->registerJs(
    "
$('#form-submit').on('beforeSubmit', function(e) {

    var form = $(this);

    var formData = form.serialize();

    $.ajax({
        url: form.attr(\"action\"),
        type: form.attr(\"method\"),
        data: formData,
        success: function (data) {
            alert('Success : ' + data);
            $.pjax.reload({container: '#pjax_id_point', async: false});
            focusToNew();
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
<script>
    function focusToNew() {
        var lat = $('#add-form #referencepoint-latitude').val();
        var long = $('#add-form #referencepoint-longitude').val();
            
        clearMainMap();
        loadMainData();

        map.flyTo({
        //center: [(Math.random() - 0.5) * 360, (Math.random() - 0.5) * 100],
            center: [long, lat],
            zoom: 6,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
    }
</script>
