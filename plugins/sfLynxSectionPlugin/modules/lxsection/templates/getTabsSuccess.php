[
    <?php foreach ($cultures as $culture): ?>{
        title: '<?php echo strtoupper($culture->getLanguage()).' - '.sfI18N::getCountry($culture->getCountry(), $culture->getLanguage()) ?>',
        id: '<?php echo $culture->getLanguage() ?>',
        autoLoad: {
            url: '<?php echo url_for('lxsection/infoLanguage') ?>',
            params: 'language=<?php echo $culture->getLanguage() ?>&id=<?php echo $id_section ?>&status=<?php echo $culture->getStatus() ?>'
        }
    }<?php if(count($cultures)+current($cultures)-1 != count($cultures)): ?>,<?php endif ?><?php endforeach ?>
]