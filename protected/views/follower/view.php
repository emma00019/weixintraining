<?php
$this->menu=array(
	array('label'=>'Follower List', 'url'=>array('index'))
);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'subscribe',
		'openid',
		'nickname',
		'gender',
		'language',
		'city',
		'province',
		'country',
                array(
                'name'=>'headimgurl',
                'value'=>CHtml::image($model->headimgurl,'',array('width'=>'100px','height'=>'100px')),
                'type'=>'raw'
                ),
		'subscribe_time',
		'unionid',
		'remark',
		'groupid'
	),
));
?>

