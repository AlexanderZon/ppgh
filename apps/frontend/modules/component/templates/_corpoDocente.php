<?php use_javascript('jq/jquery.filter-list.js') ?>
<?php use_stylesheet('/js/fancybox/jquery.fancybox.css') ?>
<?php use_javascript('fancybox/jquery.fancybox.js') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
<h4><?php echo __('Corpo docente') ?></h4>
<div style="margin-bottom:10px;">
    <?php echo __('Busca de Docentes') ?>:<br />
    <input type="text" size="40" name="filter" id="filter" /> 
    <br />
   <span class="not-resumo"><em><strong>(*)</strong>
           <?php echo __('Professores aposentados ligados aos programas de pós-graduação') ?></em></span> 
</div>
<table cellpadding="0" cellspacing="0" border="0"  style="width: 100%" >
    <tbody id="fill">
    <?php if($docentes):?>
        <?php foreach($docentes as $doc): ?>
            <tr>
                <td class="borderBottomDarkGray">
                    <div style="float: left; width: 60px;">
                        <?php if($doc['photo']):  ?>
                            <a href="/uploads/docente/big_<?php echo $doc['photo'] ?>" class="fancybox" >
                                <?php echo image_tag('/uploads/docente/med_'.$doc['photo'], 'class="borderImage" width="50" align="left" style="margin-right:5px;" ')?>
                            </a>
                        <?php else:?>
                            <?php echo image_tag('user', 'border=0 width="50" class="borderImage" align="left" style="margin-right:5px;"  ');?>
                        <?php endif;?>
                    </div>
                    <div style="padding-bottom:10px; margin-bottom:5px; border-bottom:1px solid #ccc; float: left; width: 400px;">
                      <span class="tit-noticia"><?php echo __('Docente') ?>:</span> <a href="javascript:void(0);" target="_blank" class="texto" ><?php echo $doc['nome_docente'] ?></a> <br /> 
                      <span class="tit-noticia"><?php echo __('Ramal') ?>:</span><span class="texto"> <?php echo $doc['ramal'] ?></span> <span class="tit-noticia">Sala:</span><span class="texto"> <?php echo $doc['sala'] ?></span> <br />
                      <span class="tit-noticia">E-mail:</span><a class="texto" href="mailto:<?php echo $doc['email'] ?>"><?php echo $doc['email'] ?></a> <span class="tit-noticia">Site:</span><span class="texto"> <a target="_blank" class="texto" href="http://<?php echo $doc['site'] ?>"><?php echo $doc['site'] ?></a></span> <br />
                      <span class="tit-noticia"><?php echo __('Currículo Lattes') ?>:</span>
                      <span class="texto"> <a class="texto" href="http://<?php echo $doc['curriculo'] ?>" target="_blank"><?php echo __('Clique aqui para visualizar') ?></a></span><br />
                    </div> 
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif;?>
    </tbody>
</table>
<?php include_partial('global/share'); ?>