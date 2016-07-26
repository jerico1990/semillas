<?php 
?>   
<br>
   <br>
      <br>
         <br>
            <h3>Formatos Generales</h3>
            <?php //echo CHtml::link("Formato 1",array('formato1')); ?>
            <form action="filtros" method="post" name="general1" > 
            <input name="id" id="id" value="0" type="hidden">            
            </form>
            <a href="javascript:general_1()">Formato 1</a>
            <br>
            <br>
            <?php //echo CHtml::link("Formato 2",array('filtros','id'=>"1")); ?>
            <form action="filtros" method="post" name="general2" > 
            <input name="id" id="id" value="1" type="hidden">            
            </form>
            <a href="javascript:general_2()">Formato 2</a>
            <br>
            <br>
            <br>
            <br>
            <h3>Filtros</h3>
            <br>
            <br>
            <form action="filtros" method=post name="region">
               <input name="id" id="id" value="2" type="hidden">
            <?php $this->widget('bootstrap.widgets.TbTypeahead', array(
                     //'model'=>$model, // instance of model 'User'
                     'name'=>'region',
                     //'attribute'=>'id_city', // foreign key field
                     'options'=>array(
                         'source'=>CJSON::decode($region),                        
                         'items'=>3,
                         'matcher'=>"js:function(item) {return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
                         )
                     )
                 );
                 ?>
            </form>
            <a href="javascript:filtro_1()">Filtro Region</a> 
            <br>
            <br>
            
            <?php 
               $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                  'action'=>'filtros',
                  'method'=>'POST',
                   'htmlOptions'=>array('name'=>'fetiquetado',
                   
                   ),                  
               ));
               ?>
               <input name="id" id="id" value="3" type="hidden">
            <?php echo $form->datepickerRow($model,'fecha',
																 array(
											 'htmlOptions'=>array(),	
											 'options'=>array( 'format' => 'dd-mm-yyyy', 
											 'weekStart'=> 1,
											 'showButtonPanel' => true,
											 'showAnim'=>'fold',))); ?>
            <?php $this->endWidget(); ?>
            
            <a href="javascript:filtro_2()">Filtro Fecha Etiquetado</a>
            <br>
            <br>
            <form action="filtros" method=post name="categoria">
               <input name="id" id="id" value="4" type="hidden">
                <?php $this->widget('bootstrap.widgets.TbTypeahead', array(
                     //'model'=>$model, // instance of model 'User'
                     'name'=>'categoria',
                     //'attribute'=>'id_city', // foreign key field
                     'options'=>array(
                         'source'=>CJSON::decode($categoria),                        
                         'items'=>3,
                         'matcher'=>"js:function(item) {return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
                         )
                     )
                 );
                 ?>
            </form>
            <a href="javascript:filtro_3()">Filtro categoria</a>
            <br>
            <br>
            <form action="filtros" method=post name="especie" > 
            <input name="id" id="id" value="5" type="hidden">
            <?php $this->widget('bootstrap.widgets.TbTypeahead', array(
                     //'model'=>$model, // instance of model 'User'
                     'name'=>'especie',
                     //'attribute'=>'id_city', // foreign key field
                     'options'=>array(
                         'source'=>CJSON::decode($especie),                        
                         'items'=>3,
                         'matcher'=>"js:function(item) {return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
                         )
                     )
                 );
                 ?>
            </form>
            <a href="javascript:filtro_4()">Filtro especie</a>
            <br>
            <br>
            <form action="filtros" method=post name="cultivar">
               <input name="id" id="id" value="6" type="hidden">
            <?php $this->widget('bootstrap.widgets.TbTypeahead', array(
                     //'model'=>$model, // instance of model 'User'
                     'name'=>'cultivar',
                     //'attribute'=>'id_city', // foreign key field
                     'options'=>array(
                         'source'=>CJSON::decode($cultivar),                        
                         'items'=>3,
                         'matcher'=>"js:function(item) {return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
                         )
                     )
                 );
                 ?>
            </form>
            <a href="javascript:filtro_5()">Filtro cultivar</a>
            <br>
            <br>
           <!-- <form action="formato2" method=post name="plantas"> 
            <input name="datos" id="datos" >
            </form>
            <a href="javascript:filtro_6()">Filtro plantas</a>-->
            <br>
            <br>
            <!--********************************************************************
            ************************************************************************
            ************************************************************************
            ************************************************************************-->
            
<script>
function general_1(){ 
   document.general1.submit() 
}
function general_2(){ 
   document.general2.submit() 
}
function filtro_1(){ 
   document.region.submit() 
}
function filtro_2(){ 
   document.fetiquetado.submit() 
}
function filtro_3(){ 
   document.categoria.submit() 
}
function filtro_4(){ 
   document.especie.submit() 
}
function filtro_5(){ 
   document.cultivar.submit() 
}
function filtro_6(){ 
   document.plantas.submit() 
}
</script>