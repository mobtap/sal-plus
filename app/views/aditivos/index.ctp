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
            echo $form->create('Aditivo', array(
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
    <?php if ( $aditivos != null) { ?>        
    <div class="aditivos index">
            <div class="row mt">
            <div class="col-lg-12">
            <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Aditivos
            <?php 
            if ( isset($this->passedArgs['fk']) )
                echo ' do contrato ' . $contratos[$this->passedArgs['fk']];
            ?>
            </h4>
            <section id="unseen">
            <table class="table table-bordered table-striped table-advance table-hover">
            <thead>
            <tr>
                <?php if ( !isset($this->passedArgs['fk']) ) { ?>
                <th><?php echo $this->Paginator->sort('Contrato','Contrato.numero');?></th>
                <?php } ?>
                <th><?php echo $this->Paginator->sort('Número','numero');?></th>
                <th class="hidden-phone"><?php echo $this->Paginator->sort('Processo','numero_processo');?></th>
                <th class="hidden-phone"><?php echo $this->Paginator->sort('Ano','ano_processo');?></th>
                <th class="hidden-phone"><?php echo $this->Paginator->sort('Tipo','Tipoaditivo.title');?></th>
                <th class="hidden-phone"><?php echo $this->Paginator->sort('Documento','documento');?></th>
                <th class="actions"><?php __('Ações');?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aditivos as $aditivo): ?>
            <tr>
            <?php if ( !isset($this->passedArgs['fk']) ) { ?>
            <td>
                <?php echo $this->Html->link($aditivo['Contrato']['numero'], array('controller' => 'contratos', 'action' => 'view', $aditivo['Contrato']['id'])); ?>
            </td>
            <?php } ?>
            <td><?php echo $aditivo['Aditivo']['numero']; ?>&nbsp;</td>
            <td class="hidden-phone"><?php echo $aditivo['Aditivo']['numero_processo']; ?>&nbsp;</td>
            <td class="hidden-phone"><?php echo $aditivo['Aditivo']['ano_processo']; ?>&nbsp;</td>
            <td class="hidden-phone">
                <?php echo $this->Html->link($aditivo['Tipoaditivo']['title'], array('controller' => 'tipoaditivos', 'action' => 'view', $aditivo['Tipoaditivo']['id'])); ?>
            </td>
            <td class="hidden-phone">
                <?php 
                if (!empty($aditivo['Aditivo']['documento'])) {
                    echo $this->Html->link(
                            $this->Html->image(str_replace('img/','',h($aditivo['Aditivo']['documento'])),array('width'=>'50','height'=>'50'))
                         ,'/' .  $aditivo['Aditivo']['documento'],array('escape' => false,'target'=>'blank','class'=>"lightbox"));
                } else {
                    echo $this->Html->image('aditivos/sem-documento.png',array('width'=>'50','height'=>'50'));
                };
                ?>&nbsp;
            </td>            
            <td>
                <?php echo $this->Html->link($this->Html->image('image_new.gif', array('alt' => 'Documento','title' => 'Documento')), array('action' => 'file', $aditivo['Aditivo']['id']),array('escape' => false)); ?>
                <?php echo $this->Html->link($this->Html->image('page-find.gif', array('alt' => 'Consultar','title' => 'Consultar')), array('action' => 'view', $aditivo['Aditivo']['id']),array('escape' => false)); ?>
                <?php echo $this->Html->link($this->Html->image('edit-icon.gif', array('alt' => 'Editar','title' => 'Editar')), array('action' => 'edit', $aditivo['Aditivo']['id'], 'fk'=>(isset($this->passedArgs['fk']) ? $this->passedArgs['fk'] : null)),array('escape' => false)); ?>
                <?php echo $this->Html->link($this->Html->image('hr.gif', array('alt' => 'Excluir','title' => 'Excluir')), array('action' => 'delete', $aditivo['Aditivo']['id'],'fk'=>(isset($this->passedArgs['fk']) ? $this->passedArgs['fk'] : null)),array('escape' => false), sprintf(__('Tem certeza que deseja excluir o aditivo # %s?', true), $aditivo['Aditivo']['numero'])); ?>
            </td>
    </tr>
<?php endforeach; ?>
            </tbody>
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