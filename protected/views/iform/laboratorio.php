<h1>Laboratorio</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	//'template'=>'{items} {pager}',
	'itemView'=>'_laboratorio',
)); ?>