<h1 class="icono_user"><a href="<?php echo url_for('lxuser/index') ?>" ><?php echo __('Usuários')  ?></a> - <?php echo __('Editar usuário') ?></h1>
<div id="title_module">
    
    <form id="lxuser" action="<?php echo url_for('lxuser/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_user='.$form->getObject()->getIdUser() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <div id="info_pessoais">
            <?php include_partial('form', array('form' => $form, 'html' => $html, 'tipoUser' => $tipoUser)) ?>
        </div>
    </form>        
</div>
