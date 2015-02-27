<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Pessoa</h4>
            <div class="form-horizontal style-form">
                <div class="form-group">
                    <label class="col-sm-2">ID</label>
                    <div class="col-sm-10"><?php echo $recurso['Recurso']['id']; ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Contrato</label>
                    <div class="col-sm-10"><?php echo $this->Html->link($recurso['Contrato']['numero'], array('controller' => 'contratos', 'action' => 'view', $recurso['Contrato']['id'])); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Pessoa</label>
                    <div class="col-sm-10"><?php echo $this->Html->link($recurso['Pessoa']['nome'], array('controller' => 'pessoas', 'action' => 'view', $recurso['Pessoa']['id'])); ?></div>
                </div>                
                <?php echo $this->element('adminfields',array('currentModel' => $recurso['Recurso'])); ?>
            </div>
        </div>
    </div>
</div>  
<!-- SALPLUS | Copyright: 2013 Smartbyte - Luis E. S. Dias | Contato: smartbyte.systems@gmail.com  -->