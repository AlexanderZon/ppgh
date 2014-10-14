<option value="">Selecione uma Cidade... </option>
<?php if($items): ?>
  <?php foreach ($items as $item): ?>
    <option value="<?php echo $item->getIdCiudad() ?>"> <?php echo $item->getNomeCiudad(); ?> </option>
  <?php endforeach; ?>
<?php endif; ?>

