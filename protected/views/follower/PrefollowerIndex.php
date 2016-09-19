<h1>Manage Followers</h1>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'follower-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'avatar',
            'type'=>'html',
            'value'=>'(!empty($data->avatar))?CHtml::image($data->avatar,"",array("style"=>"width:100px;height:100px;")):"暂无图片"',
        ),
        'username',
		'address',
		'create_time',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}'
		),
	),
)); 

//Mainly for testing zii.ztree.zTree
$arr = array();
foreach ($menuModel->findAll() as $m) {
    $arrayName = array('id'=>$m['id'], 'pId'=>$m['parent_id'], 'name'=>$m['id'].$m['name']);
    array_push($arr, $arrayName );
}

$this->widget('zii.ztree.zTree', array(
        'treeNodeNameKey'=>'name',
        'treeNodeKey'=>'id',
        'treeNodeParentKey'=>'pId',
        'options'=>array(
                'expandSpeed'=>"",
                'showLine'=>true,
        ),
       'data'=> $arr
));
?>