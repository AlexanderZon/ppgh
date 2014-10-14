<script type="text/javascript"> 
    $("img.cal-button-left").attr('id', 'dec_<?php echo $ano_atual ?>_<?php echo $mes_atual ?>');
    $("img.cal-button-right").attr('id', 'inc_<?php echo $ano_atual ?>_<?php echo $mes_atual ?>');
    $(".title-mes").html('<?php echo $functions->consulta_mes($mes_atual).' '.$ano_atual ?>');
</script>
<?php
    $dias_mes = $functions->diasMes($mes_atual,$ano_atual);
    $begin_dia_mes = date('w',  mktime(0,0,0,$mes_atual,'01',$ano_atual));
?>
<ul class="calendario-eventos" >
    <?php for($nd = 0; $nd < $begin_dia_mes; $nd++): ?>
        <li style="">&nbsp;</li>
    <?php endfor; ?>
    <?php for($nd = 1; $nd < $dias_mes; $nd++): ?>
        <li style="">
            <?php if(@$eventosMes[$nd]): ?>
                <a href="<?php echo url_for('@submenu?secciones=eventos&subseccion=dat-event-'.$eventosMes[$nd]) ?>"><?php echo $nd; ?></a>
            <?php else: ?>
                <?php echo $nd; ?>
            <?php endif; ?>                                    
        </li>
    <?php endfor; ?>
</ul>
