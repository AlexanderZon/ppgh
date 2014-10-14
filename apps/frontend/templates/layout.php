<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
        <?php include_partial('global/header'); ?>            
        <div class="content">
            <div class="col1">
                <?php include_component('component', 'menu') ?>
            </div>
            <div class="col2">
                <?php echo $sf_content ?>        
            </div>
            <div class="col3">
                <?php include_component('component', 'colDerecha') ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php include_partial('global/footer'); ?>
  </body>
</html>
