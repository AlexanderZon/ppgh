<?php if($sf_request->getParameter('secciones')): ?>
<?php $cultures = SfLanguagePeer::listTabLanguages(); ?>
<?php $id_secoe = SfSectionPeer::getIdSectionBySecoe($sf_request->getParameter('secciones')); ?>
<div class="header">
    <div class="header-body">
        <div style="margin-top: 20px; width: 50%; float: left; ">
            <a href="<?php echo url_for('@homepage') ?>">
            <h1>DEPARTAMENTO DE GEOGRAFIA<br />
                FACULDADE DE FILOSOFIA, LETRAS E CIÊNCIAS HUMANAS<br />
          UNIVERSIDADE DE SÃO PAULO</h1>
            </a>
        </div>
        <div style="float: left; width: 50%; height: 120px; padding-top: 28px;">
            <div style="text-align:right; color:#006699; font-size:11px; padding-right:5px;">
                <?php echo format_date(date('Y-m-d'), 'D') ?>
            </div> 
            <div class="search-header">
                <form action="<?php echo url_for('@menu?secciones=busca') ?>" method="POST" >
                    <span>
                        <input placeholder="<?php echo __('Busca') ?>" type="text" class="search rounded" name="buscador" id="buscador">
                        <input type="submit" value="<?php echo __('Buscar') ?>">
                    </span>
                </form>
            </div>
            <div>
            <?php foreach ($cultures as $culture): ?>
            <span class="data" style="float:right; margin-right: 3px;">
                <a href="http://<?php echo $sf_request->getHost() ?>/frontend_dev.php/<?php echo $culture->getLanguage() ?>/home"><?php echo image_tag('frontend/flags/png/'.strtolower($culture->getCountry()), 'border="0"') ?></a>
            </span>
            
            <?php endforeach; ?>
            </div>
        </div>
        <div class="linha-tit"></div>
    </div>
</div>
<!--SLIDER-->
<div class="slider-body">
    <div class="slider">
        <div id="slider" class="nivoSlider">
            <?php if($id_secoe->getIdBanner()): ?>
                <?php $banner_sel = BannerI18nPeer::retrieveByPK($id_secoe->getIdBanner()); ?>
                <?php $file_banner = sfConfig::get('sf_upload_dir').'/banner/'.$sf_request->getParameter('sf_culture').'-banner-'.$banner_sel->getPrefijoNomeBanner();  ?>
                <?php if (file_exists($file_banner)):  ?>
                    <img src="/uploads/banner/<?php echo $sf_request->getParameter('sf_culture') ?>-banner-<?php echo $banner_sel->getPrefijoNomeBanner() ?>" />
                <?php else: ?>
                    <img src="/images/frontend/slide1.jpg" alt="" />
                <?php endif;?>  
            <?php else: ?>
                <img src="/images/frontend/slide1.jpg" alt="" />
            <?php endif; ?>
        </div>
    </div>
    <div class="logo">
    <a href="<?php echo url_for('@homepage') ?>"><img src="/images/frontend/logo.png" width="335" height="215" border="0" /></a></div>
</div>
<!--SLIDER-->
<?php endif; ?>