<?php if($tipo_solicitudes): ?>
    <div class="aba-laranja2"><?php echo __('Solicitações on-line') ?></div>
    <div class="ultimas-noticias-body">
        <?php foreach ($tipo_solicitudes as $tipo): ?>
            <h3><a href="<?php echo url_for('@submenu?secciones=solicitudes&subseccion='.$tipo['permalink']) ?>"><?php echo $tipo['nome_tipo'] ?></a></h3>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div style="margin-bottom:20px;"><a href="http://www.pos.fflch.usp.br/defesas/simplificado" target="_blank">
<img src="/images/frontend/news.jpg" width="250" height="130" border="0" /></a></div>
<div class="aba-laranja2"><?php echo __('Calendário de eventos') ?></div>
<?php include_component('component', 'calendario') ?>

