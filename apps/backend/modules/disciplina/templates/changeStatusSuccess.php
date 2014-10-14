<?php echo jq_link_to_remote(image_tag($Disciplina->getStatus().'.png','alt="" title="" border=0'), array(
    'update'  =>  'status_'.$Disciplina->getIdDisciplina(),
    'url'     =>  'disciplina/changeStatus?id_disciplina='.$Disciplina->getIdDisciplina().'&status='.$Disciplina->getStatus(),
    'script'  => true,
    'before'  => "$('#status_".$Disciplina->getIdDisciplina()."').html('". image_tag('preload.gif','title="" alt=""')."');"
));
?>
