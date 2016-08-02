<h1><?php //echo CrugeTranslator::t('logon',"Login"); ?></h1>
<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
    <?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>
<?php else: ?>
<div class="form ">
	<div class="span12">
	<div class="row-fluid">
		<div class="span1">
		</div>
		<div class="span4"><?php echo CHtml::image(Yii::app()->baseUrl."/images/seed_large.png",'',array( 'width'=>'250')); ?></div>
		<div class="span4">	       
			<?php 
			$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			    'id'=>'verticalForm',
			    'htmlOptions'=>array('class'=>'well offset4 span12','style' =>'background-color: #EFEFEF'),
			));
			?>
			
			    <?php echo $form->textFieldRow($model, 'username', array('class'=>'span10')); ?>
			    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span10')); ?>
			    <?php echo $form->checkBoxRow($model,'rememberMe'); ?>
			    <?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'success','buttonType'=>'submit', 'label'=>'Ingresar','htmlOptions'=>array('class'=>'span3'))); ?>
			    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 'label'=>'Recuperar Clave','type'=>'link','url'=>'/peas/cruge/ui/pwdrec')); ?>
				
			    <?php   if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1) ?>
					
				    <?php echo CHtml::link('Registrar',array('../solicitud/index')); ?>	
				
				<?php
					if(Yii::app()->getComponent('crugeconnector') != null){
					if(Yii::app()->crugeconnector->hasEnabledClients){ 
				?>
				<div class='crugeconnector'>
					<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
					<ul>
					<?php 
						$cc = Yii::app()->crugeconnector;
						foreach($cc->enabledClients as $key=>$config){
							$image = CHtml::image($cc->getClientDefaultImage($key));
							echo "<li>".CHtml::link($image,
								$cc->getClientLoginUrl($key))."</li>";
						}
					?>
					</ul>
				</div>
				<?php }} ?>
				
			
			<?php $this->endWidget(); ?>
		</div>
	</div>
	</div>
</div>


<?php endif; ?>




 
