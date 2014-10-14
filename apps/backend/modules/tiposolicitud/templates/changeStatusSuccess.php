<?php echo jq_link_to_remote(image_tag($SolicitudTipo->getStatus().'.png','alt="" title="" border=0'), array(
    'update'  =>  'status_'.$SolicitudTipo->getIdSolicitudTipo(),
    'url'     =>  'tiposolicitud/changeStatus?id='.$SolicitudTipo->getIdSolicitudTipo().'&status='.$SolicitudTipo->getStatus(),
    'script'  => true,
    'before'  => "$('#status_".$SolicitudTipo->getIdSolicitudTipo()."').html('". image_tag('preload.gif','title="" alt=""')."');"
));
?>
