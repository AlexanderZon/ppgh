<script type="text/javascript"> 
    $(document).ready(function() {
        var tabContainers = $('div.tabs > div');
        tabContainers.hide().filter(':first').show();
        $('div.tabs ul.tabNavigation a').click(function () {
                tabContainers.hide();
                tabContainers.filter(this.hash).show();
                $('div.tabs ul.tabNavigation a').removeClass('selected');
                $(this).addClass('selected');
                return false;
        }).filter(':first').click();
    })
</script>
<div>
    <div class="search-component">
        <form action="<?php echo url_for('@menu?secciones=busca') ?>" method="POST" >
            <span>
                <input placeholder="<?php echo __('Busca') ?>" type="text" class="search-button-component" name="buscador" id="buscador">
                <input type="submit" value="<?php echo __('Buscar') ?>">
            </span>
        </form>
    </div>
</div>
<div class="tabs" style="margin-top: 10px;">
    <ul class="tabNavigation">
        <li class='tab'><a href="#busca-1"><?php echo __('Páginas') ?> <?php echo $secciones ? '('.count($secciones).')' : '' ?></a></li>
        <li class='tab'><a href="#busca-2"><?php echo __('Noticias') ?> <?php echo $noticias ? '('.count($noticias).')' : '' ?></a></li>
        <li class='tab'><a href="#busca-3"><?php echo __('Eventos') ?> <?php echo $eventos ? '('.count($eventos).')' : '' ?></a></li>
    </ul>
    <div id="busca-1">    
        <?php if($secciones): ?>
            <?php echo __('Foi encontrado') ?> <?php echo count($secciones) ?> <?php echo __('páginas')?> <?php echo __('con a palavra') ?> (<strong><?php echo $busca ?></strong>)
            <br /><br />
            <?php foreach ($secciones as $secc): ?>
            <a class="pesquisa" href="<?php echo url_for('@menu?secciones='.$secc['link']) ?> "><?php echo $secc['nome'] ?></a> <br />
                <?php 
                    $maximo = strlen($secc['des']);  
                    $total= strpos($secc['des'],$busca); 
                    $primera_cadena = substr($secc['des'],0,$total); 
                    $cadena = substr($secc['des'],$total - 10,185); 
                ?>
                <?php $cont = $secc['des']  ?>
                <?php $cont = $primera_cadena.' <strong>...</strong> '.$cadena  ?>
                <?php $cont = str_replace($busca,"<span style='color: #000; font-weight: bold;'>$busca</span>",$cont);?>
                <?php echo html_entity_decode($cont) ?><br /><br />
            <?php endforeach; ?>
        <?php else: ?>
                <?php include_partial('global/error_no_found', array('tab' => 'páginas', 'busca' => $busca)) ?>                
        <?php endif; ?>
    </div>
    <div id="busca-2">    
        <?php if($noticias): ?>
            <?php echo __('Foi encontrado') ?> <?php echo count($noticias) ?> <?php echo __('noticias') ?> <?php echo __('con a palavra') ?> (<strong><?php echo $busca ?></strong>)
            <br /><br />
            <?php foreach ($noticias as $not): ?>
            <a class="pesquisa" href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$not['permalink']) ?>"><?php echo $not['titulo'] ?></a>
            <br />
                <?php 
                    $maximo = strlen($not['body']);  
                    $total= strpos($not['body'],$busca); 
                    $primera_cadena = substr($not['body'],0,$total); 
                    $cadena = substr($not['body'],$total - 10,185); 
                ?>
                <?php $cont = $not['body']  ?>
                <?php $cont = $primera_cadena.' <strong>...</strong> '.$cadena  ?>
                <?php $cont = str_replace($busca,"<span style='color: #000; font-weight: bold;'>$busca</span>",$cont);?>
                <?php echo html_entity_decode($cont) ?><br /><br />
            <?php endforeach; ?>
        <?php else: ?>
                <?php include_partial('global/error_no_found', array('tab' => 'noticias', 'busca' => $busca)) ?>                
        <?php endif; ?>
    </div>
    <div id="busca-3">    
        <?php if($eventos): ?>
            <?php echo __('Foi encontrado') ?> <?php echo count($eventos) ?> <?php echo __('eventos') ?> <?php echo __('con a palavra') ?> (<strong><?php echo $busca ?></strong>)
            <br /><br />
            <?php foreach ($eventos as $event): ?>
            <a class="pesquisa" href="<?php echo url_for('@permalink?secciones=eventos&subseccion=detalle&permalink='.$event['permalink']) ?>"><?php echo $event['titulo'] ?></a>
            <br />
                <?php 
                    $maximo = strlen($event['body']);  
                    $total= strpos($event['body'],$busca); 
                    $primera_cadena = substr($event['body'],0,$total); 
                    $cadena = substr($event['body'],$total - 10,185); 
                ?>
                <?php $cont = $event['body']  ?>
                <?php $cont = $primera_cadena.' <strong>...</strong> '.$cadena  ?>
                <?php $cont = str_replace($busca,"<span style='color: #000; font-weight: bold;'>$busca</span>",$cont);?>
                <?php echo html_entity_decode($cont) ?><br /><br />
            <?php endforeach; ?>
        <?php else: ?>
                <?php include_partial('global/error_no_found', array('tab' => 'eventos', 'busca' => $busca)) ?>                
        <?php endif; ?>
    </div>
</div>
