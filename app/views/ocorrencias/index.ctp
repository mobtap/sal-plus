<div id="center-column">
    <div class="top-bar">
        <?php 
        if ( isset($this->passedArgs['fk']) ) {
            echo $this->Html->link(__('Novo', true), array('action' => 'add', 'fk'=>$this->passedArgs['fk']), array('class'=>'btn btn-primary'));
        } else {
            echo $this->Html->link(__('Novo', true), array('action' => 'add'), array('class'=>'btn btn-primary'));
        }
        ?>           
    </div> 
    <div class="filter-form">
    <?php
        if ( !isset($this->passedArgs['fk']) ) {
            echo $form->create('Ocorrencia', array(
                    'url' => array_merge(array('action' => 'find'), $this->params['pass']),
                    'class'=>'form-inline'
                    ));
            echo "<div class=\"form-group\">";
            echo $form->input('contrato_id', array('label'=>'Contrato','div' => false,'empty'=>'-- Todos --','class'=>'form-control'));
            echo $form->submit('Filtrar', array('div' => false, 'alt'=>'filtrar', 'title'=>'filtrar','class'=>'btn btn-primary'));
            echo "</div>";
            echo $form->end();
        }
    ?>   
    </div>
    <?php if ( $ocorrencias != null) { ?>        
    <div class="ocorrencias index">                
        <div class="row mt">
        <div class="col-lg-12">
        <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Ocorrências
        <?php 
        if ( isset($this->passedArgs['fk']) )
            echo ' do contrato ' . $contratos[$this->passedArgs['fk']];
        ?>       
        </h4>
        <section id="unseen">     
        <table class="table table-bordered table-striped table-advance table-hover">
            <tr>
                <?php if ( !isset($this->passedArgs['fk']) ) { ?>
                <th><?php echo $this->Paginator->sort('Contrato','Contrato.numero');?></th>
                <?php } ?>                 
                <th><?php echo $this->Paginator->sort('Data','dt_ocorrencia');?></th>
                <th><?php echo $this->Paginator->sort('Tipo','Tipoocorrencia.title');?></th>
                <th class="actions"><?php __('Ações');?></th>
            </tr>
            <?php foreach ($ocorrencias as $ocorrencia): ?>
            <tr>
            <?php if ( !isset($this->passedArgs['fk']) ) { ?>
            <td>
                <?php echo $this->Html->link($ocorrencia['Contrato']['numero'], array('controller' => 'contratos', 'action' => 'view', $ocorrencia['Contrato']['id'])); ?>
            </td>
            <?php } ?>        
            <td><?php echo $ocorrencia['Ocorrencia']['dt_ocorrencia']; ?>&nbsp;</td>
            <td>
                    <?php echo $this->Html->link($ocorrencia['Tipoocorrencia']['title'], array('controller' => 'tipoocorrencias', 'action' => 'view', $ocorrencia['Tipoocorrencia']['id'])); ?>
            </td>
            <td class="actions">
                    <?php echo $this->Html->link($this->Html->image('page-find.gif', array('alt' => 'Consultar','title' => 'Consultar')), array('action' => 'view', $ocorrencia['Ocorrencia']['id']),array('escape' => false)); ?>
                    <?php echo $this->Html->link($this->Html->image('edit-icon.gif', array('alt' => 'Editar','title' => 'Editar')), array('action' => 'edit', $ocorrencia['Ocorrencia']['id'],'fk'=>(isset($this->passedArgs['fk']) ? $this->passedArgs['fk'] : null)),array('escape' => false)); ?>
                    <?php echo $this->Html->link($this->Html->image('hr.gif', array('alt' => 'Excluir','title' => 'Excluir')), array('action' => 'delete', $ocorrencia['Ocorrencia']['id'],'fk'=>(isset($this->passedArgs['fk']) ? $this->passedArgs['fk'] : null)),array('escape' => false), sprintf(__('Tem certeza que deseja excluir a ocorrência da data %s?', true), $ocorrencia['Ocorrencia']['dt_ocorrencia'])); ?>
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
<!-- SALPLUS | Copyright: 2013-2015 Smartbyte - Luis E. S. Dias | Contato: smartbyte.systems@gmail.com  -->