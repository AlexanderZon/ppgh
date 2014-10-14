<link rel="stylesheet" type="text/css" href="/css/modal.css" />
<?php //echo image_tag('frontend/no_image', 'style="position: absolute;height: 81px;"') ?>
<table id="table-lista-modal">
    <caption>
        <h1>UNIVERSIDADE DE SÃO PAULO FACULDADE DE FILOSOFIA, LETRAS E CIÊNCIAS HUMANAS</h1>
        <h2>DISCIPLINAS DE PÓS-GRADUAÇÃO OFERECIDAS NO <?php echo $semestre->getSemestre() ?>° SEMESTRE DE <?php echo $semestre->getAno() ?> 
            </h2>
    </caption>
    <thead>
        <th>Código - Nome da Disciplina e Professor Ministrante</th>
        <th>Nº. de Créditos</th>
        <th>Início e Horário do Curso</th>
        <th>ESPECIAIS</th>
        <th>UNESP e UNICAMP</th>
        <th>REGULARES da USP (matrículas via WEB + ingressantes(2)</th>
        <th>Local do Curso</th>
    </thead>
    <tbody>
        <?php if($discplinas): ?>
            <?php foreach($discplinas as $disc): ?>
                <tr>
                    <td class="border-bottom">
                        <strong><?php echo $disc->getCodigo() ?></strong> - 
                        <?php echo $disc->getNomeDisciplina() ?><br />
                        <strong>Prof. <?php echo $disc->getProfesor() ?></strong>
                    </td>
                    <td class="border-bottom center"><strong><?php echo $disc->getNumeroCredito() ?></strong></td>
                    <td class="border-bottom center" style="font-weight: bold; text-align: center;">
                        <?php echo $sfValid->formatoFechaMySQL($disc->getFecha()); ?><br />
                        <?php echo $sfValid->getNomeDia($disc->getFecha()); ?><br />
                        
                        <?php echo $disc->getHoraInicio() ?> às <?php echo $disc->getHoraFim() ?>
                    </td>
                    <td class="border-bottom center" style="font-weight: bold;"><?php echo $disc->getEspeciais() ?></td>
                    <td class="border-bottom center" style="font-weight: bold;"><?php echo $disc->getUnespUnicamp() ?></td>
                    <td class="border-bottom center" style="font-weight: bold;"><?php echo $disc->getRegularesUsp() ?></td>
                    <td class="border-bottom" style="font-weight: bold;"><?php echo $disc->getLocalCurso() ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>