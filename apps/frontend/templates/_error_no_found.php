<?php echo __('Não foram encontradas')?> <?php echo $tab ?> <?php echo __('para a sua pesquisa') ?> (<strong><?php echo $busca ?>)</strong>.<br />
<br /><?php echo __('Sugestões') ?>:<br />
<ul>
    <li><?php echo __(sfConfig::get('app_msn_no_resultados_op1')) ?></li>
    <li><?php echo __(sfConfig::get('app_msn_no_resultados_op2')) ?></li>
    <li><?php echo __(sfConfig::get('app_msn_no_resultados_op3')) ?></li>
</ul>