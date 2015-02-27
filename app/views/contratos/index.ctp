<div id="center-column">
    <div class="top-bar">
        <?php 
        if ( $this->action == 'index' || $this->action == 'find' )
            echo $this->Html->link(__('Novo', true), array('action' => 'add'), array('class'=>'btn btn-primary')); 
        ?>                    
    </div> 
    <div class="filter-form">
    <?php
            echo $form->create('Contrato', array(
                'url' => array_merge(array('action' => 'find'), $this->params['pass']),
                'class'=>'form-inline'
                ));
            echo "<div class=\"form-group\">";
            echo $form->input('numero', array('label'=>'Número','div' => false,'class'=>'form-control'));
            echo $form->submit('Filtrar', array('div' => false, 'alt'=>'filtrar', 'title'=>'filtrar','class'=>'btn btn-primary'));
            echo "</div>";
            echo $form->end();
    ?> 
    </div>
    <?php if ( $contratos != null) { ?>        
    <div class="contratos index">
            <div class="row mt">
            <div class="col-lg-12">
            <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Contratos
            </h4>
            <section id="unseen">          
            <table class="table table-bordered table-striped table-advance table-hover">
            <tr>
                    <th><?php echo $this->Paginator->sort('Número','numero');?></th>                
                    <th><?php echo $this->Paginator->sort('Situação','Situacao.title');?></th>
                    <th><?php echo $this->Paginator->sort('Licitação','Licitacao.num_edital');?></th>
                    <th><?php echo $this->Paginator->sort('Documento','documento');?></th>
                    <th><?php echo $this->Paginator->sort('Empenho','numero_empenho');?></th>
                    <th class="actions"><?php __('Ações');?></th>
            </tr>
            <?php foreach ($contratos as $contrato): ?>
            <tr>
            <td><?php echo $contrato['Contrato']['numero']; ?>&nbsp;</td>        
            <td>
                    <?php echo $this->Html->link($contrato['Situacao']['title'], array('controller' => 'situacoes', 'action' => 'view', $contrato['Situacao']['id'])); ?>
            </td>
            <td>
                    <?php echo $this->Html->link($contrato['Licitacao']['num_edital'], array('controller' => 'licitacoes', 'action' => 'view', $contrato['Licitacao']['id'])); ?>
            </td>
            <td>
                <?php 
                if (!empty($contrato['Contrato']['documento'])) {
                    echo $this->Html->link(
                            $this->Html->image(str_replace('img/','',h($contrato['Contrato']['documento'])),array('width'=>'50','height'=>'50'))
                         ,'/' .  $contrato['Contrato']['documento'],array('escape' => false,'target'=>'blank','class'=>"lightbox"));
                } else {
                    echo $this->Html->image('contratos/sem-documento.png',array('width'=>'50','height'=>'50'));
                };
                ?>&nbsp;
            </td>
            <td><?php echo $contrato['Contrato']['numero_empenho']; ?>&nbsp;</td>
            <td class="actions" style="width:25%;">
                    <?php echo $this->Html->link($this->Html->image("page_text.gif", array("alt" => "Aditivos",'title' => 'Aditivos')), array('controller' => 'aditivos', 'action' => 'index', 'fk' => $contrato['Contrato']['id'] ),array('escape' => false)); ?>                
                    <?php echo $this->Html->link($this->Html->image("comments.png", array("alt" => "Ocorrências",'title' => 'Ocorrências')), array('controller' => 'ocorrencias', 'action' => 'index', 'fk' => $contrato['Contrato']['id'] ),array('escape' => false)); ?>
                    <?php echo $this->Html->link($this->Html->image("group.png", array("alt" => "Recursos",'title' => 'Recursos')), array('controller' => 'recursos', 'action' => 'index', 'fk' => $contrato['Contrato']['id'] ),array('escape' => false)); ?>
                    <?php echo $this->Html->link($this->Html->image("note_new.gif", array("alt" => "Recebimentos",'title' => 'Recebimentos')), array('controller' => 'recebimentos', 'action' => 'index', 'fk' => $contrato['Contrato']['id'] ),array('escape' => false)); ?>
                
                    <?php echo $this->Html->link($this->Html->image('image_new.gif', array('alt' => 'Documento','title' => 'Documento')), array('action' => 'file', $contrato['Contrato']['id']),array('escape' => false)); ?>                    
                    <?php echo $this->Html->link($this->Html->image('page-find.gif', array('alt' => 'Consultar','title' => 'Consultar')), array('action' => 'view', $contrato['Contrato']['id']),array('escape' => false)); ?>
                    <?php echo $this->Html->link($this->Html->image('edit-icon.gif', array('alt' => 'Editar','title' => 'Editar')), array('action' => 'edit', $contrato['Contrato']['id']),array('escape' => false)); ?>
                    <?php echo $this->Html->link($this->Html->image('hr.gif', array('alt' => 'Excluir','title' => 'Excluir')), array('action' => 'delete', $contrato['Contrato']['id']),array('escape' => false), sprintf(__('Tem certeza que deseja excluir o contrato # %s?', true), $contrato['Contrato']['numero'])); ?>
            </td>
    </tr>
<?php endforeach; ?>
            </table>
        </section>                  
        <?php echo $this->element('paginator'); ?>
        </div><!-- /content-panel -->
        </div><!-- /col-lg-4 -->			
        </div><!-- /row -->                 
        </div>                
        <?php 
        } else {
            echo $this->Html->tag('span','Não existem itens para listar',array('class'=>'info-msg','div'=>'false'));
        } ?>                           
</div>
<!-- SALPLUS | Copyright: 2013 Smartbyte - Luis E. S. Dias | Contato: smartbyte.systems@gmail.com  -->