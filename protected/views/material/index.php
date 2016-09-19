<?php
/* @var $this MaterialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Materials',
);

$this->menu=array(
	array('label'=>'Create Material', 'url'=>array('create')),
	array('label'=>'Manage Material', 'url'=>array('admin')),
);
?>

<h1>Materials</h1>

<?php
	foreach ($dataProvider->findAll() as $m) {
		$addCount = 0;
	    $delCount = 0;
?>
 <div class="view">
				<span>id:</span>
				<span><?php echo $m['id']; ?></span>
				<br/>

				<span>title:</span>
				<span><?php echo $m['title']; ?></span>
				<br/>

				<span>description:</span>
				<span><?php echo $m['desc']; ?></span>
				<br/>

				<span>picUrl:</span>
				<img src="<?php echo $m['picUrl']; ?>" width="50px" height="50px"/>
				<br/>

				<span>url:</span>
				<span><?php echo $m['url']; ?></span>
                <br/>
                <?php 
	            foreach ($models as $model) {
	            	
                	if ($model['material_id'] != $m['id']){ 
                		$addCount++;
                	}else{
		        		$delCount++; 
					}
				}		        
                
                if(($addCount > $delCount) || ($addCount==$delCount && $addCount==0)){ ?>
		        	<button class="<?php echo $m['id'];?>" id="<?php echo $m['id']."add";?>" title="<?php echo $scene_str;?>"; onclick="addMaterial(this)" >点击添加</button>
		        	<button class="<?php echo $m['id'];?>" id="<?php echo $m['id']."del";?>" title="<?php echo $scene_str;?>"; onclick="removeMaterial(this)" style="display:none">删除素材</button>
		        <?php } else  { ?>
		        <button class="<?php echo $m['id'];?>" id="<?php echo $m['id']."add";?>" title="<?php echo $scene_str;?>"; onclick="addMaterial(this)" style="display:none">点击添加</button>
		        	<button class="<?php echo $m['id'];?>" id="<?php echo $m['id']."del";?>" title="<?php echo $scene_str;?>"; onclick="removeMaterial(this)" >删除素材</button>
		        <?php }?>

</div>
	<?php	}  ?>

<script src="/../../../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
	function addMaterial(obj)
	{
		var scene_str = obj.title;
		var material_id = obj.className;

        $.ajax({
            type:"POST",
            url: "index.php?r=QrcodeMaterial/create",
            data: {scene_str:scene_str,material_id:material_id}
        });

        $("#"+obj.id).hide();
        $("#"+material_id+"del").show();

        window.reload();
	}

	function removeMaterial(obj)
	{
		var scene_str = obj.title;
		var material_id = obj.className;
        $.ajax({
            type:"POST",
            url: "index.php?r=QrcodeMaterial/admin",
            data: {scene_str:scene_str, material_id:material_id},
        });

        $("#"+obj.id).hide();
        $("#"+material_id+"add").show();
        window.reload();
	}

</script>
