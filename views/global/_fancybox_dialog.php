<?php
$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/plugins/fancybox/jquery.fancybox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php
$this->registerJs(
    '  
    $(".various").fancybox({
        maxWidth    : 800,
        maxHeight   : 700,
        fitToView   : false,
        // width        : "70%",
        // height       : "70%",
        autoSize    : true,
        closeClick  : false,
        openEffect  : "none",
        closeEffect : "none"
    });
        '
);
?>