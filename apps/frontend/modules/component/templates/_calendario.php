<script type="text/javascript"> 
$(document).ready(function() {
    $("img.cal-button-left, img.cal-button-right").click(function () {
        var mes_ano = $(this).attr("id");
        //$("#sf_section_id_banner").val(oID);
        var url_link = 'http://'+location.hostname+'/frontend_dev.php/';
        
        $.ajax
        ({
            type: "POST",
            url:  url_link + "/ajax/getDiasMes",
            data: "val=" + mes_ano,
            success: function(msg)
            {
                $("#dias-mes").html(msg);
            }
        });
        
    });      
})
</script>
<div id="calendario-form">
    <div style="float: left;">
        <?php echo image_tag('frontend/calendar-left',array('id' => 'dec_'.$ano_atual.'_'.$mes_atual,'class' => 'cal-button-left' )) ?>
    </div>
    <div class="title-mes">
        <?php echo $functions->consulta_mes($mes_atual).' '.$ano_atual  ?>
    </div>
    <div style="float: left;">
        <?php echo image_tag('frontend/calendar-right',array('id' => 'inc_'.$ano_atual.'_'.$mes_atual,'class' => 'cal-button-right' )) ?>
    </div>
    <div style="width: 238px; height: 140px; border-top: 1px dotted #CCC; margin-top: 38px; ">
        <?php $dias_semana = array('0' => 'd', '1' => 's', '2' => 't', '3' => 'q', '4' => 'q', '5' => 's', '6' => 's'); ?>
        <table id="calendar">
            <thead>
                <tr>
                    <?php for($d = 0; $d < count($dias_semana); $d++): ?>
                        <th><?php echo $dias_semana[$d]; ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" style="text-align: left;" id="dias-mes">
                        <ul class="calendario-eventos" >
                            <?php for($nd = 0; $nd < $begin_dia_mes; $nd++): ?>
                            <li style="">&nbsp;</li>
                            <?php endfor; ?>
                            <?php for($nd = 1; $nd < $dias_mes; $nd++): ?>
                                <li>
                                    <?php if(@$eventosMes[$nd]): ?>
                                        <a href="<?php echo url_for('@submenu?secciones=eventos&subseccion=dat-event-'.$eventosMes[$nd]) ?>"><?php echo $nd; ?></a>
                                    <?php else: ?>
                                        <?php echo $nd; ?>
                                    <?php endif; ?>                                    
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
</div>
    
