<?php


/**
 * Skeleton subclass for performing query and update operations on the 'solicitud' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 23/07/2013 11:15:26
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.crismoe
 */
class SolicitudPeer extends BaseSolicitudPeer {
    
    public static function getArquivosSolicitud($id)
    {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ARQ_PLANO_TRABALHO);
        $c->addSelectColumn(self::ARQ_JUSTIFICATIVA);
        $c->addSelectColumn(self::ARQ_ORCAMENTO);
        $c->addSelectColumn(self::ARQ_CURRICULO_LATTED);
        $c->addSelectColumn(self::ARQ_PEDIDO_DO_INTERESSADO);
        $c->addSelectColumn(self::ARQ_CREDENCIAMENTO);
        $c->addSelectColumn(self::ARQ_PROF_EXTERNO);
        $c->addSelectColumn(self::ARQ_CADASTRO_DOCENTE_EXTERNO);
        $c->addSelectColumn(self::ARQ_CARTA_ALUNO);
        $c->addSelectColumn(self::ARQ_MANIFESTACAO_ORIENTADOR);
        $c->addSelectColumn(self::ARQ_CRONOGRAMA_ACTIVIDADES);
        $c->addSelectColumn(self::ARQ_COPIA_TRABALHO);
        $c->addSelectColumn(self::ARQ_COMPROBANTE);
        $c->addSelectColumn(self::ARQ_TRANSFERENCA_ORIENTACAO);
        $c->addSelectColumn(self::ARQ_TERMO_ORIENTADOR);
        $c->addSelectColumn(self::ARQ_RELATORIO_QUALIFICACAO);
        $c->addSelectColumn(self::ARQ_PROJETO_PESQUISA);
        $c->addSelectColumn(self::ARQ_SOLICITACAO_BOLSA);
        $c->addSelectColumn(self::SUGESTAO_BANCA);
        
        $c->add(self::ID_SOLICITUD, $id, Criteria::EQUAL);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch())
        {
            $dato['arq_plano_trabalho']             = $res['ARQ_PLANO_TRABALHO'];
            $dato['arq_justificativa']              = $res['ARQ_JUSTIFICATIVA'];
            $dato['arq_orcamento']                  = $res['ARQ_ORCAMENTO'];
            $dato['arq_curriculo_Latted']           = $res['ARQ_CURRICULO_LATTED'];
            $dato['arq_pedido_do_interessado']       = $res['ARQ_PEDIDO_DO_INTERESSADO'];
            $dato['arq_credenciamento']             = $res['ARQ_CREDENCIAMENTO'];
            $dato['arq_prof_externo']               = $res['ARQ_PROF_EXTERNO'];
            $dato['arq_cadastro_docente_externo']    = $res['ARQ_CADASTRO_DOCENTE_EXTERNO'];
            $dato['arq_carta_aluno']                = $res['ARQ_CARTA_ALUNO'];
            $dato['arq_manifestacao_orientador']             = $res['ARQ_MANIFESTACAO_ORIENTADOR'];
            $dato['arq_cronograma_actividades']      = $res['ARQ_CRONOGRAMA_ACTIVIDADES'];
            $dato['arq_copia_trabalho']             = $res['ARQ_COPIA_TRABALHO'];
            $dato['arq_comprobante']                = $res['ARQ_COMPROBANTE'];
            $dato['arq_transferenca_orientacao']     = $res['ARQ_TRANSFERENCA_ORIENTACAO'];
            $dato['arq_termo_orientador']           = $res['ARQ_TERMO_ORIENTADOR'];
            $dato['arq_relatorio_qualificacao']      = $res['ARQ_RELATORIO_QUALIFICACAO'];
            $dato['arq_projeto_pesquisa']           = $res['ARQ_PROJETO_PESQUISA'];
            $dato['arq_solicitacao_bolsa']          = $res['ARQ_SOLICITACAO_BOLSA'];
            $dato['sugestao_banca']          = $res['SUGESTAO_BANCA'];
        }
        if(!empty($dato))
        {
            return $dato;
        }else{
            return false;
        }
    }

} // SolicitudPeer