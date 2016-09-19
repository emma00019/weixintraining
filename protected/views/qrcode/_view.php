<?php
/* @var $this QrcodeController */
/* @var $data Qrcode */
?>

<div class="view">
    <table>
	    <tr>
		    <td width="10%">
				<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		    </td>
		    <td width="20%">
				<?php echo CHtml::encode($data->scene_str); ?>
	        </td>
	        <td width="20%">
				<?php echo CHtml::encode($data->name); ?>
		    </td>

		    <td>
		    	<form action="index.php?r=Material/index" method="POST">
		    		<input value="<?php echo $data->scene_str;?>" name="scene_str" style="display:none"/>
		        	<button>点击进行扫描素材设置</button>
		    	</form>
		    </td>
	    </tr>
    </table>
</div>
<script src="/../../../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
	function setMaterail(obj) 
	{
		$.ajax({
	        type:"POST",
	        url: "index.php?r=QrcodeMaterial/view",
	        data: 'id='+ obj.title,
	        //成功后回调的函数 
	        success: function(msg){
	            alert( "Operation is successful!");
	        }
        });

		//window.location.href = "index.php?r=Material/index&scene_str=" + <?php echo CHtml::encode($data->scene_str); ?>
      location.href = "index.php?r=menu";
	}
</script>