<?php

/**
 * Semestres form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class SemestresForm extends BaseSemestresForm
{
  public function configure()
  {
    $numeros = array('1' => '1','2' => '2');
    $range  = array('2013' => '2013','2014' => '2014');
    
    $this->widgetSchema['semestre'] = new sfWidgetFormChoice(array('choices' => $numeros));
    $this->widgetSchema['ano'] = new sfWidgetFormChoice(array('choices' => $range));
    //Validadores Post-Envio
    $this->validatorSchema->setPostValidator(
            new sfValidatorAnd(
            array(new sfValidatorCallback(array('callback' => array($this, 'valida')))
    )));
  }
  
  public function valida($validator, $values) 
  {
       $request =  sfContext::getInstance()->getRequest();
        
        if($this->getObject()->isNew())
        {
             $valida = SemestresPeer::validaNoRepeatNews($values['semestre'], $values['ano']);

             if($valida)
             {
                 $error = new sfValidatorError($validator, 'Os dados inseridos já está registrado no sistema');
                 throw new sfValidatorErrorSchema($validator, array('semestre' => $error));
             }
        }else{
            $valida = SemestresPeer::validaNoRepeat($request->getParameter('id_sem'),$values['semestre'], $values['ano']);
            if($valida)
             {
                 $error = new sfValidatorError($validator, 'Os dados inseridos já está registrado no sistema');
                 throw new sfValidatorErrorSchema($validator, array('semestre' => $error));
             }
        }

       
       return $values;
  }
}
