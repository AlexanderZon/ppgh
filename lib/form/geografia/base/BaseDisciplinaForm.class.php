<?php

/**
 * Disciplina form base class.
 *
 * @method Disciplina getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDisciplinaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_disciplina'   => new sfWidgetFormInputHidden(),
      'id_sem'          => new sfWidgetFormInputText(),
      'id_materia'      => new sfWidgetFormInputText(),
      'codigo'          => new sfWidgetFormInputText(),
      'nome_disciplina' => new sfWidgetFormInputText(),
      'profesor'        => new sfWidgetFormInputText(),
      'numero_credito'  => new sfWidgetFormInputText(),
      'fecha'           => new sfWidgetFormDate(),
      'hora_inicio'     => new sfWidgetFormInputText(),
      'hora_fim'        => new sfWidgetFormInputText(),
      'especiais'       => new sfWidgetFormInputText(),
      'unesp_unicamp'   => new sfWidgetFormInputText(),
      'regulares_usp'   => new sfWidgetFormInputText(),
      'local_curso'     => new sfWidgetFormInputText(),
      'status'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_disciplina'   => new sfValidatorPropelChoice(array('model' => 'Disciplina', 'column' => 'id_disciplina', 'required' => false)),
      'id_sem'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_materia'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'codigo'          => new sfValidatorString(array('max_length' => 30)),
      'nome_disciplina' => new sfValidatorString(array('max_length' => 100)),
      'profesor'        => new sfValidatorString(array('max_length' => 100)),
      'numero_credito'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'fecha'           => new sfValidatorDate(),
      'hora_inicio'     => new sfValidatorString(array('max_length' => 10)),
      'hora_fim'        => new sfValidatorString(array('max_length' => 10)),
      'especiais'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'unesp_unicamp'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'regulares_usp'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'local_curso'     => new sfValidatorString(array('max_length' => 30)),
      'status'          => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('disciplina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Disciplina';
  }


}
