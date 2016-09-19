<?php
/* @var $this QrcodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qrcodes',
);

$this->menu=array(
	array('label'=>'Create Qrcode', 'url'=>array('create')),
	array('label'=>'Manage Qrcode', 'url'=>array('admin')),
);
?>

<h1>Qrcodes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
