<div id="home_backend" >
    <div class="menu">
        <?php echo image_tag('menu/corpo_docente') ?>
        <br /> 
        <?php echo link_to('Corpo Docente','@default_index?module=docente','style=""') ?>
    </div>
    <div class="menu">
        <?php echo image_tag('menu/disciplina') ?>
        <br /> 
        <?php echo link_to('Disciplinas','@default_index?module=disciplina','style=""') ?>
    </div>
    <div class="menu">
        <?php echo image_tag('menu/eventos') ?>
        <br /> 
        <?php echo link_to('Eventos','@default_index?module=eventos','style=""') ?>
    </div>
    <div class="menu">
        <?php echo image_tag('menu/news') ?>
        <br /> 
        <?php echo link_to('Noticias','@default_index?module=news','style=""') ?>
    </div>
    <div class="menu">
        <?php echo image_tag('menu/secciones') ?>
        <br /> 
        <?php echo link_to('Seções','@default_index?module=lxsection','style=""') ?>
    </div>
    <div class="menu">
        <?php echo image_tag('menu/solicitaciones') ?>
        <br /> 
        <?php echo link_to('Solicitudes','@default_index?module=solicitudes','style=""') ?>
    </div>
</div>