<?php echo jq_link_to_remote(image_tag('mail','alt="" title="" border=0'), array(
    'update'  =>  'participante-'.$sf_request->getParameter('id_participante'),
    'url'     =>  'eventos/recordatorio?id_participante='.$sf_request->getParameter('id_participante').'&id_evento='.$sf_request->getParameter('id_evento'),
    'script'  => true,
    'before'  => "$('#participante-".$sf_request->getParameter('id_participante')."').html('". image_tag('preload.gif','title="" alt=""')."');"
));
?>