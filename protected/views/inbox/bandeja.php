
<script>
        $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
            }
            e.stopPropagation();
        });
    });
    
    
</script>





<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));*/

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'form-form',
    'htmlOptions'=>array('class'=>'well'),
   
)); ?>

<div class="container">
	<div class="row">


		<div class="span4">
			<div class="tree well">
                                <ul>        
                                    <li>
                                        <span><i class="icon-folder-open"></i> Solicitudes</span> 
                                            <ul>
                                                <li>
                                                    <span><i class="icon-leaf"></i> Ins. Campo</span>
                                                   
                                                </li>		
                                                <li>
                                                    <span><i class="icon-leaf"></i> Ins. Acondiciomanmiento</span> <a href="">Goes somewhere</a>
                                                </li>
                                                
                                            </ul>
                                    </li>
                                    
                                    <li>
                                        <span><i class="icon-folder-open"></i> Pagos</span> 
                                            <ul>
                                                <li>
                                                    <span><i class="icon-leaf"></i> Generar Pago</span> <a href="">Goes somewhere</a>
                                                </li>
                                            
                                                <li>
                                                    <span><i class="icon-leaf"></i> Registrar Pago</span> <a href="">Goes somewhere</a>
                                                </li>
                                                
                                            </ul>
                                    </li>
                                </ul>
                            </div>
		</div>
		<div class="span6">

                            
		</div>
		<div class="span4">
                    asdas
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>