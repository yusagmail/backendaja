<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Polyline */

$this->title = 'Update Polyline';
$this->params['breadcrumbs'][] = ['label' => 'Polyline', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_polyline]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box" style="padding: 6px;" id="update-form">
	<div class="box-body polyline-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	        'action' => 'update'
	    ]) ?>

	</div>
</div>

<?php
$this->registerJs(
    "
$('#update-form #form-submit').on('beforeSubmit', function(e) {
	console.log('test');
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
	console.log('teste');
    e.preventDefault();
    var form = $(this);

    var formData = form.serialize();

    $.ajax({
        url: form.attr(\"action\"),
        type: form.attr(\"method\"),
        data: formData,
        success: function (data) {
            alert('Success Update : ' + data);
            $.pjax.reload({container: '#pjax_id_point', async: false});
            focusToNewUpdate();
        },

        error: function () {
            alert('Something went wrong');
        }

    });
});
");
?>
<script>
    function focusToNewUpdate() {
        var lat = $('#update-form #polyline-latitude').val();
    	var long = $('#update-form #polyline-longitude').val();
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