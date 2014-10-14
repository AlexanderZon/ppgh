<div style="background-color: #FFF">
<div style="padding-top: 5px;">&nbsp;</div>
<div class="content">
<?php echo image_tag('error/error_404') ?>
</div>
</div>
<div class="content" style="background-color: #FFF; padding-left: 97px;">
<span class="text">
<strong style="color: #FE7F01;font-size: 19px;"><?php echo __("Qual é o próximo") ?></strong>
<br /><br />
<?php echo link_to_function(__("Voltar à página anterior"),"history.go(-1)") ?>
<br />
<?php echo link_to(__("Vá para a Página Inicial"),'@homepage') ?>
<br />
</span>
</div>