<div style="width: 1000px; margin: auto;">
    <table width="100%" border="0" cellspacing="1">
        <tr>
          <td width="51%">
              <div id="logo-cte">
                  <a href="<?php echo url_for('@homepage') ?>">
                <?php echo image_tag('logo_cte') ?>
                      </a>
              </div>
          </td>
          <td width="49%" align="right" valign="bottom">
                <?php if($sf_user->isAuthenticated()): ?>
                <div id="top_user_nav" style="margin-right: 5px;position: relative;top: 10px;">
                    <div style="display:inline-block">
                        <div class="name"><?php echo $sf_user->getAttribute('nameUser') ?></div>
                        <div class="user_karmacash"><?php echo link_to(__('Fechar'),'@default?module=lxlogin&action=close');?></div>
                    </div>
                    
                    <?php $foto = LxUserPeer::getCurrentPassword($sf_user->getAttribute('idUserPanel'))  ?>
                    <?php if($foto->getPhoto()):  ?>
                        <?php echo image_tag('/uploads/users/med_'.$foto->getPhoto(), 'class="image" style="position: relative;top: 6px;"')?>
                    <?php else:?>
                        <?php echo image_tag('icons/icon_user', 'border=0  class="image" style="position: relative;top: 6px;"');?>
                    <?php endif;?>
                    <div class="arrow"></div>
                </div>
                <?php endif; ?>
          </td>
        </tr>
    </table>	
</div>
