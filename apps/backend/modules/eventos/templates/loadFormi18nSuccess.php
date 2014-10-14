<label>Título Evento</label><br />
<input type="text"  name="nome_evento_<?php echo $culture ?>" id="nome_evento_<?php echo $culture ?>" value="<?php echo $EventoI18n->getTitulo() ?>" style="width: 250px;" /><br />
<label>Sumário</label><br />
<textarea cols="50" rows="6" name="resumen_<?php echo $culture ?>" id="resumen_<?php echo $culture ?>" ><?php echo $EventoI18n->getResumen() ?></textarea><br />
<label>Descrição</label><br />
<textarea cols="50" contenteditable="true" rows="6" class="tiny-content-<?php echo $culture ?>" name="descripcao_<?php echo $culture ?>" id="descripcao_<?php echo $culture ?>" ><?php echo $EventoI18n->getDescripcion() ?></textarea>
<input type="hidden" name="language" id="language" value="<?php echo $culture ?>" />
<script type="text/javascript"> 
    tinymce.init({
        selector: "textarea.tiny-content-<?php echo $culture ?>",
        menu: { 
            edit: {title: 'Editar', items: 'undo redo | cut copy paste | selectall'}, 
            insert: {title: 'Insert', items: '|'}, 
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'}, 
            table: {title: 'Table'}, 
            tools: {title: 'Tools'} 
        },
        height : 200
    });
    $('#nome_evento_<?php echo $culture ?> , #resumen_<?php echo $culture ?>').blur(function() {
        var descricao = tinymce.get('descripcao_<?php echo $culture ?>').getContent();
        $.post(url_fun + "/eventos/saveInfoI18n", { nome_evento: $('#nome_evento_<?php echo $culture ?>').val(), resumen: $('#resumen_<?php echo $culture ?>').val(), descripcion : descricao, language : '<?php echo $culture ?>', id : '<?php echo $sf_request->getParameter('id') ?>'  })
    });
</script>