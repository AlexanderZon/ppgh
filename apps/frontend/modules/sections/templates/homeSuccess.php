<?php use_javascript('jq/jcarousellite.js') ?>
<?php use_javascript('jwplayer/jwplayer.js') ?>
<script type="text/javascript">
$(document).ready(function() {
      $(".obras-home-slider").jCarouselLite({
            btnNext: ".carousel .next",
            btnPrev: ".carousel .prev"
        });
      $(".jCarouselLite").jCarouselLite({
            btnNext: ".carousel .next",
            btnPrev: ".carousel .prev"
        });
      $(".jCarouselBannerDestaque").jCarouselLite({
            btnNext: ".carousel_destaque .next",
            btnPrev: ".carousel_destaque .prev",
            auto: true,
            speed: 3500
        });

})
</script>
<div class="column span-24 last" style="margin-right: 0px; ">
  <?php foreach ($infoSecciones as $infoSeccion): ?>
    <?php if(!$infoSeccion['onlyComplement'] or $infoSeccion['showText']): ?>

      <?php if(!$infoSeccion['onlyComplement'] && $sf_request->getParameter('secciones', 'home') !== $prinSeccion): ?>
      <h1><?php echo $infoSeccionPadre['nameSection']; ?></h1>
      <?php endif; ?>

      <?php if($sf_request->getParameter('subseccion') and $infoSeccionPadre['nameSection']!=$infoSeccion['nameSection']): ?>
      <h2><?php echo strtoupper($infoSeccion['nameSection']) ?></h2>
      <?php endif; ?>

      <?php if($infoSeccion['showText']): ?>
      <?php echo html_entity_decode($infoSeccion['descripSection']); ?>
      <?php endif; ?>

      <?php if($infoSeccion['specialPage']): ?>
      <?php include_component('component', $infoSeccion['specialPage'],array('nameSection' => $infoSeccion['nameSection'], 'descripSection'=>$infoSeccion['descripSection'], 'infoSection' => $infoSeccion )) ?>
      <?php endif; ?>
      
    <?php endif; ?>
  <?php endforeach; ?>
</div>
<div class="column span-24 last" style="margin-top: 15px;">
    <ul class="iconos-home">
        <li>
            <a target="_blank" href="http://www.portal.carapicuiba.sp.gov.br/index.php" >
                <?php  echo image_tag('frontend/boton_portal') ?>
            </a>        
        </li>
        <li>
            <a href="<?php echo url_for('@menu?nucleo=carapicuiba&secciones=atos-oficiais') ?>" >
                <?php  echo image_tag('frontend/boton_atos') ?>
            </a>        
        </li>
        <li>
            <a href="<?php echo url_for('@nucleo?nucleo=ouvidoria-geral-do-municipio') ?>" >
                <?php  echo image_tag('frontend/boton_ouvidoria') ?>
            </a>        
        </li>
        <li>
            <a target="_blank" href="http://xxxdnn1203.locaweb.com.br/carapicuiba_contrib/" >
                <?php  echo image_tag('frontend/boton_notas') ?>
            </a>        
        </li>
        <li>
            <a href="<?php echo url_for('@menu?nucleo=carapicuiba&secciones=servicos') ?>" >
                <?php  echo image_tag('frontend/boton_servicos') ?>
            </a>        
        </li>
        <li>
            <a href="http://www.carapicuiba.sp.gov.br/index.php/carapicuiba/servicos/subseccion/vagas-de-emprego-pat" >
                <?php  echo image_tag('frontend/boton_empregos') ?>
            </a>        
        </li>
    </ul>
</div>
<div class="column span-24 last" style="margin-top: 15px;">
    <div class="column span-9 first border-forma" style="margin-right: 0px; height: 121px;">
        <!-- Formulario Acceso Intranet Prefeitura -->
        <table width="100%" border="0" style="width: 250px;text-align: center;margin-left: 31px;">
            <tr>
                <td colspan="2" style="vertical-align: bottom;"><h3 style="margin-bottom: 3px; margin-top: 10px;">INTRANET DA PREFEITURA</h3></td>
            </tr>
            <tr>
                <td width="124"><input type="text" name="usuario" id="usuario" value="usuário" style="width: 178px" /></td>
              <td width="60" rowspan="2">
                  <input type="submit" class="button" value="Enviar" style="margin-left: 15px;" />
              </td>
            </tr>
            <tr>
              <td><input type="text" name="senha" id="senha" value="senha" style="width: 178px" /></td>
            </tr>
        </table>
    </div>
    <div class="column span-15 last" style="margin-right: 0px; text-align: right; width: 623px;">
        <!-- Banner Rotativo Da Home -->
        <?php include_component('component', 'bannerFull') ?>
    </div>  
</div>
<div class="column span-24 last" style="margin-top: 15px;">
    <div class="column span-14 first border-forma separacion-top" style="margin-right: 0px; height: 350px;">
        <h2>OBRAS</h2>
        &nbsp;
        <div class="column span-14 last " style="margin-left: -10px; width: 615px; margin-top: -16px;" >
            <?php include_component('component', 'obrasHome') ?>
        </div>
    </div>    
    <div class="column span-9 last border-forma separacion-top" style="float: right; height: 350px;">
        <h2>Publicações Oficiais</h2>
        <div class="column span-9 last " >
        <?php include_component('component', 'atosOficiaisHome') ?>
        </div>
    </div>
    <div class="column span-14 first border-forma separacion-top" style="margin-right: 0px; height: 350px;">
        <div class="column span-11 first">
            <h2>Vídeos</h2>
            <div id="player-video-home">
                <?php include_partial('component/video-ppal') ?>
            </div>
        </div>
        <?php include_component('component', 'videosHome') ?>
    </div>    
    <div class="column span-9 last border-forma separacion-top" style="float: right; height: 350px;">
        <h2>Eventos</h2>
        <?php include_component('component', 'eventosHome') ?>
    </div>
    <div class="column span-14 first border-forma separacion-top" style="margin-right: 0px; height: 320px;">
        <h2>Destaques</h2>
        &nbsp;
        <div style="padding-left: 25px; margin-top: 0px;">     
            <?php include_component('component', 'bannerDestaque') ?>
        </div>    
    </div>    
    <div class="column span-9 last border-forma separacion-top" style="float: right; height: 320px;">
        <h2>Informativos</h2><br />
        <?php include_component('component', 'informativoHome') ?>
        <?php //echo image_tag('frontend/dev/informativo') ?>
    </div>
</div>
<?php include_component('component', 'newsHome') ?>
