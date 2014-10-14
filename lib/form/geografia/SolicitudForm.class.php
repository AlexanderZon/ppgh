<?php

/**
 * Solicitud form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class SolicitudForm extends BaseSolicitudForm
{
  public function configure()
  {
      $request = sfContext::getInstance()->getRequest();
      $this->dataTipo = SolicitudTipoI18nPeer::getTipoByPermalink($request->getParameter('subseccion'), sfContext::getInstance()->getUser()->getCulture()) ;
      
      $programa = array('' => '- Selecione -', 'GU' => 'Geografia Humana','GF' => 'Geografia Fisica');
      $nivel    = array('' => '- Selecione -', 'MES' => 'Mestrado','DOU' => 'Doutorado');
      $motivo_trancamento    = array('' => '- Selecione -', 'Saúde' => 'Saúde','Gravidez' => 'Gravidez','Profissional' => 'Profissional','Saúde-na-Família' => 'Saúde na Família', 'Outros' => 'Outros');
      $curso    = array('' => '- Selecione -', 'Mestrado' => 'Mestrado','Doutorado' => 'Doutorado','Doutorado Direto' => 'Doutorado Direto');
      $this->disableCSRFProtection();
      
      // Widgets
      $this->widgetSchema['id_solicitud_tipo']   = new sfWidgetFormInputHidden(array(), array('value' => $this->dataTipo->getId() ));
      $this->widgetSchema['programa']   = new sfWidgetFormChoice(array('choices' => $programa),  array('class' => 'validate[required]'));
      $this->widgetSchema['motivo_trancamento']   = new sfWidgetFormChoice(array('choices' => $motivo_trancamento),  array('class' => 'validate[required]'));
      $this->widgetSchema['curso']   = new sfWidgetFormChoice(array('choices' => $curso),  array('class' => 'validate[required]'));
      $this->widgetSchema['nome_completo']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['numero_uso']->setAttributes(array('class' => 'validate[required]','size' => '5','maxlength' => '30'));
      $this->widgetSchema['cpf_do_aluno']->setAttributes(array('class' => 'validate[required]','size' => '15','maxlength' => '30'));
      $this->widgetSchema['data_realizacao'] = new sfWidgetFormInputText();
      $this->widgetSchema['ministrante']->setAttributes(array('class' => '','size' => '50','maxlength' => '30'));
      $this->widgetSchema['orientador']->setAttributes(array('class' => '','size' => '50','maxlength' => '30'));
      $this->widgetSchema['horario']->setAttributes(array('class' => '','size' => '30','maxlength' => '30'));
      
      $this->widgetSchema['titulo_trabalho']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['numero_paginas']->setAttributes(array('class' => '','size' => '30','maxlength' => '30'));
      $this->widgetSchema['titular1']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['institucion1']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['endereco1']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['titular2']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['institucion2']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['endereco2']->setAttributes(array('class' => 'validate[required]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['email']->setAttributes(array('class' => 'validate[required,custom[email]]','size' => '50','maxlength' => '100'));
      $this->widgetSchema['nivel']   = new sfWidgetFormChoice(array('choices' => $nivel),  array('class' => 'validate[required]'));
      // Arquivos
      $this->widgetSchema['sugestao_banca']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_plano_trabalho']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_justificativa']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_orcamento']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_curriculo_Latted']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_pedido_do_interessado']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_credenciamento']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_prof_externo']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_cadastro_docente_externo']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_carta_aluno']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_manifestacao_orientador']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_cronograma_actividades']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_copia_trabalho']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_comprobante']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));
      $this->widgetSchema['arq_transferenca_orientacao']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));      
      $this->widgetSchema['arq_termo_orientador']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));    
      $this->widgetSchema['arq_relatorio_qualificacao']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));    
      $this->widgetSchema['arq_projeto_pesquisa']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));    
      $this->widgetSchema['arq_solicitacao_bolsa']   =   new sfWidgetFormInputFileEditable(array(
            'file_src' => '',
            'is_image'  => false,            
            'with_delete' => false,
      ));    
      
      // Valida
      $this->validatorSchema['programa'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['nome_completo'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['numero_uso'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['motivo_trancamento'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['data_realizacao'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['horario'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['titulo_trabalho'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['numero_paginas'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['titular1'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['institucion1'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['endereco1'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['titular2'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['institucion2'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['endereco2'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['ministrante'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['email'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['nivel'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['curso'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['orientador'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['cpf_do_aluno'] = new sfValidatorString(array('required' => false, 'trim' => true));
      
      $this->validatorSchema['sugestao_banca'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_plano_trabalho'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_justificativa'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_orcamento'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_curriculo_Latted'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_pedido_do_interessado'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_credenciamento'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_prof_externo'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_cadastro_docente_externo'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_carta_aluno'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_manifestacao_orientador'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_cronograma_actividades'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_copia_trabalho'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_comprobante'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_transferenca_orientacao'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_termo_orientador'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_relatorio_qualificacao'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_projeto_pesquisa'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      $this->validatorSchema['arq_solicitacao_bolsa'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => '10485760',
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif', 'application/vnd.ms-excel', 'text/plain', 'application/vnd.ms-powerpoint', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ),
      )); 
      
      
      // Labels
      $this->widgetSchema->setLabels(array(
        'programa'               => 'Programa',
        'nome_completo'           => 'Nome Completo',     
        'numero_uso'              => 'Número USP',     
        'curso'                  => 'Curso',
        'motivo_trancamento'       => 'Motivo do Trancamento',     
        'ministrante'             => 'Ministrante',     
        'email'                   => 'Email',     
        'sugestao_banca'           => 'Sugestão de Banca',     
        'cpf_do_aluno'           => 'CPF do Aluno',     
        'nivel'                   => 'Nivel',     
        'arq_plano_trabalho'        => 'Plano de Trabalho',     
        'arq_justificativa'         => 'Justificativa',     
        'arq_orcamento'            => 'Orçamento',     
        'arq_curriculo_Latted'      => 'Currículo Lattes',
        'arq_pedido_do_interessado'      => 'Pedido do Interessado',
        'arq_credenciamento'       => 'Formulário de Credenciamento',
        'arq_prof_externo'        => 'Formulário de Professor Externo',
        'arq_cadastro_docente_externo'        => 'Cadastro de Docente Externo:',
        'arq_carta_aluno'        => 'Carta do Aluno:',
        'arq_manifestacao_orientador'        => 'Manifestação do Orientador(a):',
        'arq_cronograma_actividades'        => 'Cronograma de Atividades:',
        'arq_copia_trabalho'        => 'Cópia do Trabalho:',
        'arq_comprobante'        => 'Comprobante:',
        'arq_transferenca_orientacao'        => 'Formulário de Transferência de Orientação:',
        'arq_termo_orientador'        => 'Termo do Orientador:',
        'arq_relatorio_qualificacao'        => 'Relatório de Qualificação:',
        'arq_projeto_pesquisa'        => '   Projeto de Pesquisa:',
        'arq_solicitacao_bolsa'        => 'Formulário de Solicitação de Bolsa:',
          
      )); 
      
      //Mensajes de ayuda
      $this->widgetSchema->setHelps(array(
         'orientador'    => 'Digite o nome completo de seu orientador(a). ',
         'data_realizacao'    => 'Digite a data prevista para a realização de seu Exame de Qualificação.<br />IMPORTANTE<br />A data deve ser comunicada e estar de comum acordo com todos os membros da banca.',
         'titulo_trabalho'    => 'Digite o título de seu trabalho (mesmo que seja provisório).',
         'numero_paginas'    => 'Digite o número de páginas de seu relatório de qualificação. <br />Tendo concluído os créditos exigidos em disciplinas/atividades programadas e tendo sido aprovado(a) no exame de proficiência em língua estrangeira, venho solicitar as providências no sentido de que seja designado pela Comissão de Pós-Graduação, a banca examinadora, para realização do Exame de Qualificação.',
         'titular1'    => 'Digite o nome completo do primeiro professor titular de sua banca de qualificação.',
         'titular2'    => 'Digite o nome completo do primeiro professor titular de sua banca de qualificação.',
         'institucion1'    => 'Digite qual a instituição de ensino pertence o primeiro membro de sua banca (exemplo: UNESP, DH-USP, etc.)',
         'institucion2'    => 'Digite qual a instituição de ensino pertence o primeiro membro de sua banca (exemplo: UNESP, DH-USP, etc.)',
         'endereco1'    => 'Caso o primeiro membro de sua banca seja externo, digite o endereço completo (Logradouro, número, complemento, CEP, cidade, estado, país). Se o professor já possuí cadastro e não houve alteração no endereço nos últimos 5 anos, favor desconsiderar este campo.',
         'endereco2'    => 'Caso o primeiro membro de sua banca seja externo, digite o endereço completo (Logradouro, número, complemento, CEP, cidade, estado, país). Se o professor já possuí cadastro e não houve alteração no endereço nos últimos 5 anos, favor desconsiderar este campo.',
         'nivel'    => 'Escolha qual o nível que está pleiteando.',
         'ministrante'    => 'Digite aqui o nome completo do Professor que irá ministrar a disciplina. Caso seja o mesmo que o solicitante, desconsidere esse campo.',
         'email'    => 'Insira o seu email para receber o protocolo de envio de sua solicitação.',
         'arq_plano_trabalho'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .DOC .DOCx) contendo o cronograma das atividades que o Professor irá participar (até 15 páginas)',
         'arq_justificativa'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .DOC .DOCx) contendo a justificativa da vinda do professor.',
         'arq_orcamento'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF . DOC .DOCx) contendo a indicação do apoio solicitado (orçamento previsto).',
         'arq_curriculo_Latted'    => 'Insira o seu currículo Lattes neste campo (.PDF ou .JPG)',
         'arq_pedido_do_interessado'    => 'Insira o seu Pedido do Interessado neste campo (.PDF ou .JPG)',
         'arq_credenciamento'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .DOC .DOCx)',
         'arq_prof_externo'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .JPG).',
         'arq_cadastro_docente_externo'    => 'Neste campo você deverá inserir aquivo eletrônico (.PDF .JPG) do cadastro do professor externo à USP, caso seja necessário.',
         'arq_carta_aluno'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .JPG), contendo a justificativa do pedido devidamente assinada.',
         'arq_manifestacao_orientador'    => 'Neste campo você deverá inserir o arquivo eletrônico (.pdf .jpg .doc .docx) da carta do orientador dizendo estar ciente e de acordo com o pedido.',
         'arq_cronograma_actividades'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .JPG), contendo o cronograma de atividades que serão desenvolvidas durante o período de prorrogação.',
         'arq_copia_trabalho'    => 'Neste campo você deverá inserir o arquivo eletrônico (.PDF .JPG), contendo o seu trabalho completo até a presente data, para avaliação do parecerista.',
         'arq_transferenca_orientacao'    => 'Neste campo você deverá inserir arquivo eletrônico (.PDF .JPG), contendo o formulário de transferência de orientação, devidamente assinado pelos 2 professores.',
         'arq_termo_orientador'    => 'Neste campo, você deve inserir o arquivo eletrônico (.PDF .JPG) contendo o termo assinado por seu orientador.',
         'sugestao_banca'    => 'Neste campo, você deve inserir o arquivo eletrônico (.PDF .JPG) contendo o termo assinado por seu orientador.',
      ));
      unset($this['status']);
      
  }
}
