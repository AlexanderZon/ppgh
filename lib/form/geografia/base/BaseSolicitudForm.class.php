<?php

/**
 * Solicitud form base class.
 *
 * @method Solicitud getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSolicitudForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitud'                 => new sfWidgetFormInputHidden(),
      'id_solicitud_tipo'            => new sfWidgetFormInputText(),
      'programa'                     => new sfWidgetFormInputText(),
      'curso'                        => new sfWidgetFormInputText(),
      'nome_completo'                => new sfWidgetFormInputText(),
      'numero_uso'                   => new sfWidgetFormInputText(),
      'ministrante'                  => new sfWidgetFormInputText(),
      'orientador'                   => new sfWidgetFormInputText(),
      'email'                        => new sfWidgetFormInputText(),
      'motivo_trancamento'           => new sfWidgetFormInputText(),
      'nivel'                        => new sfWidgetFormInputText(),
      'data_realizacao'              => new sfWidgetFormDate(),
      'horario'                      => new sfWidgetFormInputText(),
      'titulo_trabalho'              => new sfWidgetFormInputText(),
      'numero_paginas'               => new sfWidgetFormInputText(),
      'sugestao_banca'               => new sfWidgetFormInputText(),
      'cpf_do_aluno'                 => new sfWidgetFormInputText(),
      'titular1'                     => new sfWidgetFormInputText(),
      'institucion1'                 => new sfWidgetFormInputText(),
      'endereco1'                    => new sfWidgetFormInputText(),
      'titular2'                     => new sfWidgetFormInputText(),
      'institucion2'                 => new sfWidgetFormInputText(),
      'endereco2'                    => new sfWidgetFormInputText(),
      'arq_plano_trabalho'           => new sfWidgetFormInputText(),
      'arq_justificativa'            => new sfWidgetFormInputText(),
      'arq_orcamento'                => new sfWidgetFormInputText(),
      'arq_curriculo_Latted'         => new sfWidgetFormInputText(),
      'arq_pedido_do_interessado'    => new sfWidgetFormInputText(),
      'arq_credenciamento'           => new sfWidgetFormInputText(),
      'arq_prof_externo'             => new sfWidgetFormInputText(),
      'arq_cadastro_docente_externo' => new sfWidgetFormInputText(),
      'arq_carta_aluno'              => new sfWidgetFormInputText(),
      'arq_manifestacao_orientador'  => new sfWidgetFormInputText(),
      'arq_cronograma_actividades'   => new sfWidgetFormInputText(),
      'arq_copia_trabalho'           => new sfWidgetFormInputText(),
      'arq_comprobante'              => new sfWidgetFormInputText(),
      'arq_transferenca_orientacao'  => new sfWidgetFormInputText(),
      'arq_termo_orientador'         => new sfWidgetFormInputText(),
      'arq_relatorio_qualificacao'   => new sfWidgetFormInputText(),
      'arq_projeto_pesquisa'         => new sfWidgetFormInputText(),
      'arq_solicitacao_bolsa'        => new sfWidgetFormInputText(),
      'status'                       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_solicitud'                 => new sfValidatorPropelChoice(array('model' => 'Solicitud', 'column' => 'id_solicitud', 'required' => false)),
      'id_solicitud_tipo'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'programa'                     => new sfValidatorString(array('max_length' => 30)),
      'curso'                        => new sfValidatorString(array('max_length' => 30)),
      'nome_completo'                => new sfValidatorString(array('max_length' => 100)),
      'numero_uso'                   => new sfValidatorString(array('max_length' => 30)),
      'ministrante'                  => new sfValidatorString(array('max_length' => 30)),
      'orientador'                   => new sfValidatorString(array('max_length' => 50)),
      'email'                        => new sfValidatorString(array('max_length' => 100)),
      'motivo_trancamento'           => new sfValidatorString(array('max_length' => 50)),
      'nivel'                        => new sfValidatorString(array('max_length' => 30)),
      'data_realizacao'              => new sfValidatorDate(),
      'horario'                      => new sfValidatorString(array('max_length' => 50)),
      'titulo_trabalho'              => new sfValidatorString(array('max_length' => 150)),
      'numero_paginas'               => new sfValidatorString(array('max_length' => 50)),
      'sugestao_banca'               => new sfValidatorString(array('max_length' => 50)),
      'cpf_do_aluno'                 => new sfValidatorString(array('max_length' => 50)),
      'titular1'                     => new sfValidatorString(array('max_length' => 150)),
      'institucion1'                 => new sfValidatorString(array('max_length' => 150)),
      'endereco1'                    => new sfValidatorString(array('max_length' => 150)),
      'titular2'                     => new sfValidatorString(array('max_length' => 150)),
      'institucion2'                 => new sfValidatorString(array('max_length' => 150)),
      'endereco2'                    => new sfValidatorString(array('max_length' => 150)),
      'arq_plano_trabalho'           => new sfValidatorString(array('max_length' => 100)),
      'arq_justificativa'            => new sfValidatorString(array('max_length' => 100)),
      'arq_orcamento'                => new sfValidatorString(array('max_length' => 100)),
      'arq_curriculo_Latted'         => new sfValidatorString(array('max_length' => 100)),
      'arq_pedido_do_interessado'    => new sfValidatorString(array('max_length' => 100)),
      'arq_credenciamento'           => new sfValidatorString(array('max_length' => 100)),
      'arq_prof_externo'             => new sfValidatorString(array('max_length' => 100)),
      'arq_cadastro_docente_externo' => new sfValidatorString(array('max_length' => 100)),
      'arq_carta_aluno'              => new sfValidatorString(array('max_length' => 100)),
      'arq_manifestacao_orientador'  => new sfValidatorString(array('max_length' => 100)),
      'arq_cronograma_actividades'   => new sfValidatorString(array('max_length' => 100)),
      'arq_copia_trabalho'           => new sfValidatorString(array('max_length' => 100)),
      'arq_comprobante'              => new sfValidatorString(array('max_length' => 100)),
      'arq_transferenca_orientacao'  => new sfValidatorString(array('max_length' => 100)),
      'arq_termo_orientador'         => new sfValidatorString(array('max_length' => 100)),
      'arq_relatorio_qualificacao'   => new sfValidatorString(array('max_length' => 100)),
      'arq_projeto_pesquisa'         => new sfValidatorString(array('max_length' => 100)),
      'arq_solicitacao_bolsa'        => new sfValidatorString(array('max_length' => 100)),
      'status'                       => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('solicitud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Solicitud';
  }


}
