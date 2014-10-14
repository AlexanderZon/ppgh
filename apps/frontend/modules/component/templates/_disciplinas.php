<?php use_stylesheet('/js/fancybox/jquery.fancybox.css') ?>
<?php use_javascript('fancybox/jquery.fancybox.js') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox({'width' : '90%','autoScale' : false});
    });
</script>
<style type="text/css">
        .fancybox-custom .fancybox-skin {
                box-shadow: 0 0 50px #222;
        }
</style>
<h4><?php echo __('DISCIPLINAS DO CURSO DE PÓS-GRADUAÇÃO DE GEOGRAFIA') ?></h4>
<div class="space-content"> 
    <?php foreach ($semestres as $sem): ?>
        <?php $teste = DisciplinaPeer::getDisciplinas($sem->getIdSem()) ?>
        <?php if($teste):?>
        <p><strong>
            <a href="<?php echo url_for('ajax/detalleDisciplina?id_sem='.$sem->getIdSem()) ?>" class="fancybox fancybox.iframe" >
                <?php echo $sem->getSemestre() ?>°  Semestre de <?php echo $sem->getAno() ?>
            </a>
           </strong><br></p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
