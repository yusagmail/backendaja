<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Polyline */

$this->title = 'Add Polyline';
$this->params['breadcrumbs'][] = ['label' => 'Polyline', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding: 6px;" id="add-form">
	<div class="box-body polyline-create">

		
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
            //alert('Success : ' + data);
            const obj = JSON.parse(data);
            id_primary_add = (obj.id_primary);
            var message = obj.message;
            alert(message);
            //alert(id_primary_add);
            $.pjax.reload({container: '#pjax_id_point', async: false});
            $( '#idAddNew' ).html('#'+id_primary_add);
            $('#add-form #polyline-id_polyline').val(id_primary_add);;
            //focusToNew();
        },

        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
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
        var lat = $('#add-form #polyline-latitude').val();
        var long = $('#add-form #polyline-longitude').val();
            
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
