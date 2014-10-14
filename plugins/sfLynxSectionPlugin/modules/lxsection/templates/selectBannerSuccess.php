<?php $file_banner = sfConfig::get('sf_upload_dir').'/banner/pt-banner-'.$banner->getPrefijoNomeBanner();  ?>
<?php if (file_exists($file_banner)):  ?>
    <img src="/uploads/banner/pt-banner-<?php echo $banner->getPrefijoNomeBanner() ?>" width="300"  />
<?php endif;?>  