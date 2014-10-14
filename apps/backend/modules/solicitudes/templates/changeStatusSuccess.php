<?php echo jq_link_to_remote(image_tag($Solicitud->getStatus().'.png','alt="" title="" border=0'), array(
    'update'  =>  'status_'.$Solicitud->getIdSolicitud(),
    'url'     =>  'solicitudes/changeStatus?id_solicitud='.$Solicitud->getIdSolicitud().'&status='.$Solicitud->getStatus(),
    'script'  => true,
    'before'  => "$('#status_".$Solicitud->getIdSolicitud()."').html('". image_tag('preload.gif','title="" alt=""')."');"
));
?>
