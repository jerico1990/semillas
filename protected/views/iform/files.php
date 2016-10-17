<div class="row">
<div class="span6">
<?php
$this->widget('ext.dropzone.EDropzone', array(
   'id' => 'fileup',
   'model' => $model,
   'attribute' => 'file',
   'url' => $this->createUrl('send?id=' . $model->id . '&url=1'),
   'mimeTypes' => array('image/jpeg', 'image/png', 'application/pdf'),
   'options' => array(
      'thumbnailWidth'  => 200,
      'thumbnailHeight' => 200,
   ),
));
?>
</div>
<div class="span6">
<?php
$files = Files::model()->findAll('form_id =' . $model->id . ' AND url = \'1\'');
foreach ($files as $file) {
   echo '<div class="file-item"><a href="http://127.0.0.1/semillas/files/' . $file->name_file . '">' .  $file->name_file . '</a></div>'; 
}
?>
</div>
</div>
<div class="row">
<div class="span6">
<?php
$this->widget('ext.dropzone.EDropzone', array(
   'id' => 'filedown',
   'model' => $model,
   'attribute' => 'file',
   'url' => $this->createUrl('send?id=' . $model->id . '&url=2'),
   'mimeTypes' => array('image/jpeg', 'image/png', 'application/pdf'),
   'options' => array(
      'thumbnailWidth'  => 200,
      'thumbnailHeight' => 200,
   ),
));
?>
</div>
<div class="span6">
<?php
$files = Files::model()->findAll('form_id =' . $model->id . ' AND url = \'2\'');
foreach ($files as $file) {
   echo '<div class="file-item"><a href="http://127.0.0.1/semillas/files/' . $file->name_file . '">' .  $file->name_file . '</a></div>'; 
}
?>
</div>
</div>
<style>
   .file-item {
      width: 200px;
      height: 20px;
      margin: 5px;
      float: left;
      font-size: .8em;
      outline: 1px solid #ccc;
      padding: 5px;
      text-align: center;
      vertical-align: middle;
      line-height: 20px;
   }
</style>