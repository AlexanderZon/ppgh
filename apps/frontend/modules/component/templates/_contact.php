<div class="banner-a-crismoe">
    <h1><?php echo __('CONTATO') ?></h1>
</div>
<?php if ($sf_user->hasFlash('listo')): ?>
      <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
<?php elseif($sf_user->hasFlash('error')):?>
      <div class="msn_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?>

<div class="form-contato">
    <form id="conteudo_contato"  method="post" enctype="multipart/form-data" action="">
     <div class="field">
     <label for="nome"><div class="label"><?php echo __('Seu nome' )?>:</div></label>
     <input type="text" class="input" name="nome" id="nome" style="width: 300px" /><br/>
     </div>

     <div class="field">
    <label for="email"><div class="label"><?php echo __('Seu e-mail') ?>:</div></label>
    <input type="text" id="email" class="input" name="email" style="width: 300px" />
    </div>

     <div class="field">
     <label for="telefone"><div class="label"><?php echo __('Telefone') ?>:</div> </label>
     <input type="text" class="input" name="telefone" id="telefone" style="width: 300px" /><br/>
     </div>

     <div class="field">
     <label for="assunto"><div class="label"><?php echo __('Assunto')?>:</div></label>
     <input type="text" class="input" name="assunto" id="assunto" style="width: 300px" /><br/>
     </div>

     <div class="field">
     <label for="mensagem" ><div class="label"><?php echo __('Mensagem') ?>:</div></label>
     <textarea class="inputtext" name="mensagem" cols="50" rows="5" ></textarea>    
     </div>

     <div class="field">
         <input type="submit" value="<?php echo __('Enviar') ?>" class="button">
     </div>

     </form>

</div><!--form-contato-->
            
            