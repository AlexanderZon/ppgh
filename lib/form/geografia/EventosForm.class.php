<?php
/**
 * Eventos form.
 *
 * @package    geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class EventosForm extends BaseEventosForm
{
  public function configure()
  {
    $fieldSize = 69;
    $appYml = sfConfig::get('app_upload_images_eventos');    
    //Widgets
    $this->widgetSchema['fecha_inicio'] = new sfWidgetFormInputText(array(), array('class' => 'validate[required]'));
    $this->widgetSchema['fecha_fin'] = new sfWidgetFormInputText(array(), array('class' => ''));
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices' => array('1' => 'Ativo', '0' => 'Inativo')), array('class' => 'validate[required]'));
    $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
      'file_src'  => '',
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'      => '<div>%file%<br />%input%<br /></div>',
    ));
    //Validators
    $this->validatorSchema['imagen'] = new sfImageFileValidator(array(
        'required'      => false,
        'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
        'max_size'      => sfConfig::get('app_image_size'),
        'min_height'    => '300',
        'min_width'     => '400',
        'path'          => false,
      ), array(
        'required'      => "La imagen principal es requerida",
        'min_width'     => "El ancho de la imagen es muy corto (mínimo es %min_width%px, tiene %width%px ).",
        'min_height'    => "La altura mínima de la imagen debe ser 300px."
    ));
    $this->validatorSchema['imagen']->setMessage('mime_types','Error mime types %mime_type%.');
    //Labels
    $this->widgetSchema->setLabels(array(
      'fecha_inicio'            => 'Data de início: <span class="required">*</span>',
      'fecha_fin'               => 'Data final: <span class="required">*</span>',
      'imagen'                  => 'Imagem: ',
      'status'                  => 'Status: <span class="required">*</span>',
    ));
    $this->validatorSchema['fecha_fin'] = new sfValidatorString(array('required' => false, 'trim' => true));
    unset($this['posicion']);
    //Help Messages
    $this->widgetSchema->setHelps(array(
      'imagen' => 'A imagem deve ser JPEG, JPG, PNG ou GIF<br />
                   A imagem deve ter um tamanho Maximo de '.(sfConfig::get('app_image_size_text')).'<br />
                   A imagem deve ter um tamanho mínimo de '.$appYml['size_1']['image_width_1'].' x '.$appYml['size_1']['image_height_1'].' pixels',
    ));
    
    /*************** Validadores Post-Envio ***************/
    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(
        array(
          new sfValidatorCallback(array('callback'  => array($this, 'validateDate')))
    )));
  }
  
  public function validateDate($validator, $values){
    if($values['fecha_fin'] < $values['fecha_inicio']){
      $error = new sfValidatorError($validator, 'Rango de fechas incorrecto, la fecha de finalizacion no puede ser antes de la fecha de inicio');
      throw new sfValidatorErrorSchema($validator, array('fecha_fin' => $error));
    }
    
    return $values;
  }
}
