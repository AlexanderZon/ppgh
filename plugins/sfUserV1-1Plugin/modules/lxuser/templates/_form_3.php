<?php use_javascript('jq/jquery.tinyscrollbar.min.js') ?>       
<script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/i18n/jquery.ui.datepicker-br.js"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#scrollbar1').tinyscrollbar();
        
        $("#user_id_tipo_usuario").change(function() {
            $.ajax({
              type: "POST",
              url: "loadFormCadastro?type=" + $("#user_id_tipo_usuario").val() ,
              dataType: "script",
              beforeSend: function(objeto){
                    $("#form-tipo-cadastro").html("");
                    $("#preloader").show();                                 
              },
              success: function(msg){                    
                   $("#form-tipo-cadastro").html(msg);                
                   //$("#preloader").delay(1150).fadeOut("slow"); // will fade out the white DIV that covers the website.
                   $("#preloader").hide(); 
              },
              error: function(objeto, quepaso, otroobj){
                    $("#form-tipo-cadastro").animate({width:150, height:10}, "slow");
                    $("#form-tipo-cadastro").html('<div>Error. Please update browser&nbsp;&nbsp;&nbsp; <a href="#" onclick="fadeMessageSimple();">Hide</a></div>');
              }

            });
        
        });            
    });
</script>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="frameForm" align="center">
    <h1 class="titulo"><?php echo __('Informações Pessoais') ?></h1>
    <table width="100%" >
      <tr>
        <td>
            &nbsp;<?php echo __('Os campos marcados com') ?> <span class="required">*</span> <?php echo __('são requeridos')?>
        </td>
      </tr>
      <tr>
        <td id="errorGlobal">
            <?php echo $form->renderGlobalErrors() ?>
        </td>
      </tr>
      
    <tfoot>
      <tr>
        <td align="right">
            <?php echo $form->renderHiddenFields(false) ?>
            <table cellspacing="4">
                <tr>
                    <td>
                        <input type="submit" value="<?php echo __('Avançar') ?>" />
                    </td>
                </tr>
            </table>
        </td>
      </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>                
                <table cellpadding="0" cellspacing="2" border="0" width="100%" id="register_user">
<!--                  <tr>
                      <td style="border-bottom: 1px solid #CCC; padding-bottom: 10px;" colspan="6">
                        <h3><?php echo __('SUB TIPOS') ?> </h3><br />
                        <div class="content-subT">
                            <div id="scrollbar1">
                                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                <div class="viewport">
                                    <div class="overview">                                    
                                        <?php echo $html ?>
                                        <br /><br />
                                    </div>
                                </div>
                            </div>                                     
                        </div>
                      </td>
                  </tr>-->
                  <tr>
                        <td style="border-bottom: 0px solid #CCC; padding-bottom: 5px; padding-top: 10px; " colspan="6">
                            <h3><?php echo __('TIPOS DE CADASTRO') ?> </h3>
                            <?php echo $form['id_tipo_cadastro'] ?>
                            <?php echo $form['id_tipo_cadastro']->renderError() ?>
                        </td>
                  </tr>                  
                  <tr>
                      <td style="padding-top: 10px;border-bottom: 1px solid #CCC; padding-bottom: 10px;" colspan="6">
                            <h3><?php echo __('CATEGORIAS') ?></h3>
                            <?php echo $form['id_tipo_usuario'] ?>
                            <?php echo $form['id_tipo_usuario']->renderError() ?>
                      </td>
                  </tr>
                  <tr>
                      <td style="padding-top: 10px;" colspan="6">
                          <h3><?php echo __('DADOS DE CADASTRO') ?></h3>
                          <br />
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 17%;"><?php echo $form['codigo']->renderLabel() ?> <span class="required">*</span></td>
                      <td colspan="5">                          
                          <?php echo $form['codigo'] ?>
                          <?php echo $form['codigo']->renderError() ?>                          
                      </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['login']->renderLabel() ?> <span class="required">*</span></td>
                      <td colspan="5">                          
                          <?php echo $form['login'] ?>
                          <?php echo $form['login']->renderError() ?>                          
                      </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['password']->renderLabel() ?> <span class="required">*</span></td>
                      <td colspan="5">                          
                          <?php echo $form['password'] ?>
                          <?php echo $form['password']->renderError() ?>     
                          <span class="msn_help"><?php echo $form['password']->renderHelp() ?></span>
                      </td>
                  </tr>
                  
                  <tr>
                      <td><?php echo __('Email') ?> <span class="required">*</span></td>
                      <td colspan="5">
                          
                          <?php echo $form['email'] ?>
                          <?php echo $form['email']->renderError() ?>        
                          <?php echo $form['hola'] ?>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="6">
                        <!-- Preloader -->
                        <div id="preloader" >
                            <div id="status">&nbsp;</div>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          
                      </td>
                  </tr>
                </table>
                <div id="form-tipo-cadastro">
                    
                </div>
                </table>
                </div>
            </td>
        </tr>
    </tbody>
  </table>
</div>

