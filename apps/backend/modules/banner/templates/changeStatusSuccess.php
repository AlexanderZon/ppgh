<?php echo jq_link_to_remote(image_tag($Banner->getStatus().'.png','alt="" title="" border=0'), array(
    'update'  =>  'status_'.$Banner->getIdBanner(),
    'url'     =>  'banner/changeStatus?id_banner='.$Banner->getIdBanner().'&status='.$Banner->getStatus(),
    'script'  => true,
    'before'  => "$('#status_".$Banner->getIdBanner()."').html('". image_tag('preload.gif','title="" alt=""')."');"
));
?>
