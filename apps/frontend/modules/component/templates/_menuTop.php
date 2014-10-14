<?php //echo md5('arVVnTQb') ?>
<div class="menu">
  <?php foreach ($sections as $section): ?>
    <?php ($sf_request->getParameter('secciones', 'home') == $section['sw_menu']) ? $style='class="selected"' : $style = '' ?>
    <?php //$subsections = ExtendSfSection::searchChildrenSection($section['id'], $sf_user->getCulture()) ?>
    <?php if($section['sw_menu'] != 'home'): ?>
        <?php echo ($section['control']) ? link_to($section['nameSection'], '@menu?secciones='.$section['sw_menu']) : "<a $style style='cursor:default'>{$section['nameSection']}</a>" ?>
    <?php endif; ?>
  <?php endforeach; ?>
  <a href="<?php echo url_for('@homepage') ?>" style="padding:6px 2px 14px 2px;"><div class="home"></div></a>
</div>