<?php

?>
<div class="view">
				<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
				<br/>

				<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
				<?php echo CHtml::encode($data->title); ?>
				<br/>

				<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
				<?php echo CHtml::encode($data->desc); ?>
				<br/>

				<b><?php echo CHtml::encode($data->getAttributeLabel('picUrl')); ?>:</b>
				<?php echo CHtml::encode($data->picUrl); ?>
				<br/>

				<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
				<?php echo CHtml::encode($data->url); ?>
                <br/>
                <?php 
                //foreach ($models as $model) {
                	//if ($model['material_id'] != $data->id){
                    
                ?>
		        	<button class="addBtn" id="<?php echo $data->id."add";?>" title="<?php echo 123;?>"; onclick="addMaterial(this)">点击添加</button>
		        <?php //}else{ ?>
		        	<button class="delBtn" id="<?php echo $data->id."del";?>" title="<?php echo 123;?>"; onclick="removeMaterial(this)" >删除素材</button>
		        <?php //} }?>

</div>
<script src="/../../../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
	function addMaterial(obj)
	{
		var scene_str = obj.title;
		var material_id = obj.id;

		alert(addID);
        $.ajax({
            type:"POST",
            url: "index.php?r=QrcodeMaterial/create",
            data: {scene_str:scene_str,material_id:material_id}
        });
        $(addID).hide();
        $(delID).show();
	}

	function removeMaterial(obj)
	{
		var scene_str = obj.title;
		var material_id = obj.id;

		var addID= "#"+ material_id + "add";
		var delID = "#" + material_id + "del";

        $.ajax({
            type:"POST",
            url: "index.php?r=QrcodeMaterial/delete",
            data: {scene_str:scene_str,material_id:material_id}
        });
        $(addID).show();
        $(delID).hide();
	}

</script>