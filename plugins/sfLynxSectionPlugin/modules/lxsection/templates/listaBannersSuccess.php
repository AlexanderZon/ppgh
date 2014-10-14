<script type="text/javascript"> 
$(document).ready(function() {
    $("img.bn").dblclick(function () {
        var oID = $(this).attr("id");
        $("#sf_section_id_banner").val(oID);
        var url_link = 'http://'+location.hostname+'/backend_dev.php/';
        $('#banner-selected').html("<img src='/images/status.gif'/>").fadeIn('fast');
        jQuery.ajax({
            type:'POST',
            dataType:'html',
            success:function(data, textStatus){jQuery('#banner-selected').html(data);$("#delete-banner-selected").show();},
            url: url_link + "lxsection/selectBanner?id_banner=" + oID }); 

    });      
})


</script>
<div style="padding-bottom: 10px;">    
    <span class="msn_help">Para selecionar um banner por favor clique duas vezes sobre a imagem desejada</span>
</div>
<div style="height: 375px; overflow-y: scroll; cursor: pointer;">    
    <ul>
    <?php foreach ($listbanners as $banners): ?>
        <?php if($banners->getPrefijoNomeBanner()): ?>
            <?php $file_banner = sfConfig::get('sf_upload_dir').'/banner/pt-banner-'.$banners->getPrefijoNomeBanner();  ?>
            <?php if (file_exists($file_banner)):  ?>
                <li>
                    <img src="/uploads/banner/pt-banner-<?php echo $banners->getPrefijoNomeBanner() ?>" width="415" class="bn" id="<?php echo $banners->getIdBanner() ?>" />
                </li>
            <?php endif;?>                            
        <?php endif;?>
    <?php endforeach; ?>
    </ul>
</div>