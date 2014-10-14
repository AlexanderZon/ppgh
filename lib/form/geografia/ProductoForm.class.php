<?php

/**
 * Producto form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class ProductoForm extends BaseProductoForm
{
  public function configure()
  {
      $lang = SfLanguagePeer::getLanguagePrincipal();
      $categorias   = CategoriaPeer::getComboCategorias();
      $tipo =  TipoPeer::getComboTipos();
      if(!$this->getObject()->isNew())
      {
            $tipo = TipoCategoriaPeer::getComboTiposCategoriasEdit($this->getObject()->getIdCategoria(),$lang['language']);
            $lineas = LineaTipoPeer::getComboLineaTiposEdit($this->getObject()->getIdTipo());            
      }else{
            $tipo = array('' => 'Selecione um Tipo...');
            $lineas = array('' => 'Selecione uma linha...');
      }
      
      
      // Widgets
      $this->widgetSchema['id_categoria']   = new sfWidgetFormChoice(array('choices' => $categorias),  array('class' => 'validate[required]'));
      $this->widgetSchema['id_tipo'] = new sfWidgetFormChoice(array('choices' => $tipo), array('id' => 'tipo', 'class' => 'validate[required]'));
      $this->widgetSchema['id_linea'] = new sfWidgetFormChoice(array('choices' => $lineas), array('id' => 'linea', 'class' => 'validate[required]'));
      $this->widgetSchema['codigo']->setAttributes(Array('maxlength' => '20', 'class' => 'validate[required]','size'=> '10'));
      //$this->widgetSchema['nome_producto']->setAttributes(Array('class' => '', 'maxlength' => '70','size'=>'60'));
      //$this->widgetSchema['descricao'] = new sfWidgetFormTextarea(array(),array('cols' => '50', 'rows' => '5', 'maxlength' => '200'));
      $this->widgetSchema['status']   = new sfWidgetFormChoice(array('choices' => array('1' => 'Ativo', '0' => 'Desativo')));
      $this->widgetSchema['destaque']   = new sfWidgetFormChoice(array('choices' => array('1' => 'Sim', '0' => 'Não')));
      $this->widgetSchema['arquivo']        = new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,
            'edit_mode' => !$this->isNew(),
            'with_delete' => false,
      ));
      $this->widgetSchema['foto'] = new sfWidgetFormInputFileEditable(array(
        'file_src' => sfConfig::get('sf_upload_dir').'/producto/galeria/'.$this->getObject()->getFoto(),
        'is_image'  => true,
        'edit_mode' => !$this->isNew(),
        'template'      => '<div>%file%<br />%input%<br /></div>',
      ));
      $this->widgetSchema['foto2'] = new sfWidgetFormInputFileEditable(array(
        'file_src' => sfConfig::get('sf_upload_dir').'/producto/galeria/'.$this->getObject()->getFoto(),
        'is_image'  => true,
        'edit_mode' => !$this->isNew(),
        'template'      => '<div>%file%<br />%input%<br /></div>',
      ));
      $this->widgetSchema['foto3'] = new sfWidgetFormInputFileEditable(array(
        'file_src' => sfConfig::get('sf_upload_dir').'/producto/galeria/'.$this->getObject()->getFoto(),
        'is_image'  => true,
        'edit_mode' => !$this->isNew(),
        'template'      => '<div>%file%<br />%input%<br /></div>',
      ));
      // Validators
      $this->validatorSchema['codigo'] = new sfValidatorString(array('required' => true, 'trim' => true));
      //$this->validatorSchema['nome_producto'] = new sfValidatorString(array('required' => true, 'trim' => true));
      //$this->validatorSchema['descricao'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['status'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['medidas'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['arquivo'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['arquivo'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => sfConfig::get('app_image_size_max'),
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['foto'] = new sfValidatorFile(array(
        'required'   => false,
        'max_size'   => sfConfig::get('app_image_size'),
        'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
      ));
      $this->validatorSchema['foto2'] = new sfValidatorFile(array(
        'required'   => false,
        'max_size'   => sfConfig::get('app_image_size'),
        'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
      ));
      $this->validatorSchema['foto3'] = new sfValidatorFile(array(
        'required'   => false,
        'max_size'   => sfConfig::get('app_image_size'),
        'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
      ));
      $this->validatorSchema['foto'] = new sfImageFileValidator(array(
            'required'      => false,
            'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
            'max_size'      => sfConfig::get('app_image_size'),
            'max_height'    => '251',
            'min_height'    => '251',
            'max_width'     => '392',
            'min_width'     => '392',
            'path'          => false,
        ), array(
            'required'      => "La imagen principal es requerida",
            'max_width'     => "A largura da imagem é muito longo (o máximo é de %min_width%px, tem %width%px ).",
            'min_width'     => "A largura da imagem é muito curta (o mínimo é %min_width%px, tem %width%px ).",
            'max_height'    => "A altura da imagem deve ser 251px.",
            'min_height'    => "A altura da imagem deve ser 251px."
      ));      
      $this->validatorSchema['foto2'] = new sfImageFileValidator(array(
            'required'      => false,
            'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
            'max_size'      => sfConfig::get('app_image_size'),
            'max_height'    => '251',
            'min_height'    => '251',
            'max_width'     => '392',
            'min_width'     => '392',
            'path'          => false,
        ), array(
            'required'      => "La imagen principal es requerida",
            'max_width'     => "A largura da imagem é muito longo (o máximo é de %min_width%px, tem %width%px ).",
            'min_width'     => "A largura da imagem é muito curta (o mínimo é %min_width%px, tem %width%px ).",
            'max_height'    => "A altura da imagem deve ser 251px.",
            'min_height'    => "A altura da imagem deve ser 251px."
      ));      
      $this->validatorSchema['foto3'] = new sfImageFileValidator(array(
            'required'      => false,
            'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
            'max_size'      => sfConfig::get('app_image_size'),
            'max_height'    => '251',
            'min_height'    => '251',
            'max_width'     => '392',
            'min_width'     => '392',
            'path'          => false,
        ), array(
            'required'      => "La imagen principal es requerida",
            'max_width'     => "A largura da imagem é muito longo (o máximo é de %min_width%px, tem %width%px ).",
            'min_width'     => "A largura da imagem é muito curta (o mínimo é %min_width%px, tem %width%px ).",
            'max_height'    => "A altura da imagem deve ser 251px.",
            'min_height'    => "A altura da imagem deve ser 251px."
      ));      
      $this->validatorSchema['medidas'] = new sfValidatorString(array('required' => false, 'trim' => true));
      
      // Labels              
      $this->widgetSchema->setLabels(array(
        'id_categoria'             => 'Categoria:',
        'id_tipo'                 => 'Nome do Tipo:',
        'id_linea'                => 'Linha:',
        //'nome_producto'            => 'Nome Producto:',
        //'descricao'                => 'Descrição:',
        'status'                  => 'Status:',
        'destaque'                  => 'Destaque Home:',
        'arquivo'                 => 'Arquivo:',
        'foto'                    => 'Foto 1:',
        'foto2'                    => 'Foto 2:',
        'foto3'                    => 'Foto 3:',
      ));
      //Mensajes de ayuda
      $this->widgetSchema->setHelps(array(
          'foto'     => 'A imagem deve ser JPEG, JPG, PNG ou GIF<br />As dimensões da imagem devem ser 392px x 251px',
          'foto2'     => 'A imagem deve ser JPEG, JPG, PNG ou GIF<br />As dimensões da imagem devem ser 392px x 251px',
          'foto3'     => 'A imagem deve ser JPEG, JPG, PNG ou GIF<br />As dimensões da imagem devem ser 392px x 251px',
      ));
      unset($this['nome_producto'], $this['descricao']);
  }
  
  protected function doSave($con = null)
  {
      $module = 'producto/galeria';
      $appYml = sfConfig::get('app_upload_images_producto');
      // Si hay un nuevo archivo por subir y ya mi registro tiene un archivo asociado entonces,
      if ($this->getObject()->getFoto() && $this->getValue('foto'))
      {
          // recorro y elimino
          for($i=1;$i<=$appYml['copies'];$i++)
          {
              // Elimino las fotos de la carpeta
              if(is_file(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto()))
              {
                unlink(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto());
              }
          }
      }      
      if ($this->getObject()->getFoto3() && $this->getValue('foto3'))
      {
          // recorro y elimino
          for($i=1;$i<=$appYml['copies'];$i++)
          {
              // Elimino las fotos de la carpeta
              if(is_file(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto3()))
              {
                unlink(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto3());
              }
          }
      }      
      if ($this->getObject()->getFoto2() && $this->getValue('foto2'))
      {
          // recorro y elimino
          for($i=1;$i<=$appYml['copies'];$i++)
          {
              // Elimino las fotos de la carpeta
              if(is_file(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto2()))
              {
                unlink(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto2());
              }
          }
      }      
      return parent::doSave($con);
  }
}
