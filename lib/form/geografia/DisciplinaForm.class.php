<?php

/**
 * Disciplina form.
 *
 * @package    geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class DisciplinaForm extends BaseDisciplinaForm
{
  public function configure()
  {
      $dias = array('2','2da Feira', '3' => '3° Feira', '4' => '4ta Feira', '5' => '5ta Feira', '6' => '6ta Feira');
      $status = array('1' => 'Ativo', '0' => 'Inativo');
      $semestres = SemestresPeer::findSemestres();
      // Widgets
      $this->widgetSchema['id_sem'] = new sfWidgetFormChoice(array('choices'  => $semestres,'expanded' => false));
      //$this->widgetSchema['id_sem'] = new sfWidgetFormPropelChoice(array('model' => 'Semestres', 'order_by' => array('Semestre', 'Asc'), 'add_empty' => 'Selecione'),array('class' => 'validate[required]'));
      $this->widgetSchema['id_materia'] = new sfWidgetFormPropelChoice(array('model' => 'Materia', 'order_by' => array('Materia', 'Asc')));
      $this->widgetSchema['codigo']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '30'));
      $this->widgetSchema['nome_disciplina']->setAttributes(array('class' => 'validate[required]','size' => '45','maxlength' => '100'));
      $this->widgetSchema['profesor']->setAttributes(array('class' => 'validate[required]','size' => '45','maxlength' => '100'));
      $this->widgetSchema['numero_credito']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '30'));
      $this->widgetSchema['fecha'] = new sfWidgetFormInputText();
      $this->widgetSchema['hora_inicio']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '10'));
      $this->widgetSchema['hora_fim']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '10'));
      $this->widgetSchema['especiais']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '10'));
      $this->widgetSchema['unesp_unicamp']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '10'));
      $this->widgetSchema['regulares_usp']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '10'));
      $this->widgetSchema['local_curso']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '30'));
      $this->widgetSchema['status']   = new sfWidgetFormChoice(array('choices' => $status), array('class' => 'validate[required]'));
      // Validators
      $this->validatorSchema['id_sem'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['id_materia'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['codigo'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['nome_disciplina'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['profesor'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['numero_credito'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['fecha'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['hora_inicio'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['hora_fim'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['especiais'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['unesp_unicamp'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['regulares_usp'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['local_curso'] = new sfValidatorString(array('required' => true, 'trim' => true));
      // Labels              
      $this->widgetSchema->setLabels(array(
        'id_sem'                => 'Semestre:',
        'id_materia'             => 'Curso:',
        'codigo'                => 'Código:',
        'nome_disciplina'        => 'Nome Disciplica:',
        'fecha'                  => 'Data:',
        'hora_inicio'            => 'Hora Inicio:',
        'profesor'            => 'Professor:',
        'hora_fim'               => 'Hora Fim:',
        'especiais'              => 'Vagas para alunos ESPECIAIS:',
        'unesp_unicamp'           => 'Vagas para alunos UNESP e UNICAMP:',
        'regulares_usp'           => 'Vagas para Alunos REGULARES da USP (já matriculados e ingressantes)',
        'local_curso'             => 'Local do Curso',          
      ));
        
  }
}
