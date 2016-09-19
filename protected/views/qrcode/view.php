<?php
/* @var $this QrcodeController */
/* @var $model Qrcode */

$this->breadcrumbs=array(
	'Qrcodes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Qrcode', 'url'=>array('index')),
	array('label'=>'Create Qrcode', 'url'=>array('create')),
	array('label'=>'Update Qrcode', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Qrcode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Qrcode', 'url'=>array('admin')),
);
?>

<h1>View Qrcode #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'scene_str',
		'name',
	),
)); ?>

<div>
<?php 
	foreach($materials as $material){
?>
<br/>
<br/>
				<span>id:</span>
				<?php echo $material['id']; ?>
				<br/>

				<span>title:</span>
				<?php echo $material['title']; ?>
				<br/>

				<span>picUrl:</span>
				<img src="<?php echo $material['picUrl']; ?>" width="50px" height="50px"/>
				<br/>

				<span>url:</span>
				<?php echo $material['url']; ?>
				<br/>


<?php 	}?>
</div>
