<div id="page-wrapper">
        <div id="menu" class="menu">
        	<div class="row">
        		<div class="left">
                    <div class="left-list">
            			<div class="panel panel-primary">
            				<div class="panel-heading" id="list">
            					<span>菜单列表</span>
            					<button class="btn-apply" onclick="applyToWX()">应用到微信</button>
            				</div>
            				<!-- menu begin -->
                            <?php
                            foreach ($models->findAll() as $m) {
                            	if ($m['tag'] == 0) {
                            	}
                            	else
                            	{
                            ?>  
	                                <div id="menu_list" class="menu-list" >
	                                    <div class="menu-setting">
	                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo urldecode($m['name'])?></span>
	                                        <span onclick="delMenu(this)" class="del" title="<?php echo $m['id']?>">&nbsp;del&nbsp;</span>
	                                        <span onclick="edit(this)" class="span-edit" id="<?php echo $m['id']?>" title="<?php echo urldecode($m['name'])?>">&nbsp;edit</span>
	                                        <?php
		                                        if ($m['sub_count'] == 5) {
                                        	?>
		                                        	<span onclick="" class="add" title ="<?php echo $m['id']?>">&nbsp;add</span>   
		                                    <?php
			                                    }
			                                    else
			                                    {
		                                    ?> 
			                                        <span onclick="add(this)" class="add" title ="<?php echo $m['id']?>">&nbsp;add</span>   
		                                    <?php
			                                    }
		                                    ?>
	                                    </div>
	            					</div> 
	            					<!-- sub menu begin-->
		                            <?php
		                            foreach ($models->findAll() as $mo) {
		                            	if ($mo['parent_id'] == $m['id']) {
		                            ?>
			                                <div id="menu_list" class="menu-list" >
			                                    <div class="menu-setting">
			                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo urldecode($mo['name'])?></span>
			                                        <span onclick="delMenu(this)" class="del" title="<?php echo $mo['id']?>">&nbsp;del&nbsp;</span>
			                                        <span onclick="edit(this)" class="span-edit" id="<?php echo $mo['id']?>" title="<?php echo urldecode($mo['name'])?>">&nbsp;edit</span>
			                                    </div>
			            					</div>
		                            <?php
		                                }
		                            }
		                            ?>
	                              <!-- sub menu end -->
                            <?php
	                            }
                            }
                            ?>    
                            <!-- menu end -->
            					<div id="edit" class="edit" style="display:none">
                                    <div class="edit-text">
                                        <input id="nameInput" type="text"  class="input-text"/>
                                        <span class="btn-save" title="1" onclick="onSubmit()">保存</span>
                                        <span class="btn-cancel" title="" onclick="saveHide()">取消</span> 
                                    </div>
                                </div>
                                <div id="sub_edit" class="sub-edit" style="display:none">
                                    <div class="sub-edit-text">
                                        <input id="subNameInput" type="text"  class="sub-input-text"/>
                                        <span class="btn-save" title="0" onclick="onSubmit()">保存</span>
                                        <span class="btn-cancel" title="" onclick="subSaveHide()">取消</span> 
                                    </div>
                                </div>
            					<div class="menu-add">
	            					<?php
                                        $count = 0;

		            					foreach ($models->findAll() as $m) 
                                        {
		            						if($m['parent_id']==0)
		            						{
		            							 $count++;
		            						}
		            					}
		            					if($count ==3)
		            					{
			            		    ?>
		            						<button id="0" class="add-btn" onclick ="">
		            							&nbsp;一级菜单最多只能添加三个
		            						</button>
		            				<?php	
				            			}
				            			else
				            			{
	            					?>
		            						<button id="0" class="add-btn" onclick ="edit(this)">
		            							&nbsp;添加菜单
		            						</button>
		            				<?php
			            				}
		            				?>
            					</div>
            				</div>
            			</div>
                    </div>

        		</div>
        	</div>
        </div>
    </div>
</div>
<script src="/../../../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
    var parent_id = 0;
    var edit_id = 0;
    var name;
    var subMenuFlag = false;//If this variable is true,we will get the value from sub_edit.
    var menuFlag = false;

    function edit(obj) {
    	edit_id = obj.id;//When edit a menu or sub menu we need its id.
        $("#edit").show();
        $("#sub_edit").hide();
        menuFlag = true;
        document.getElementById('nameInput').value = obj.title;
    }
    function saveHide() {
        document.getElementById('nameInput').value = "";
        $("#edit").hide();
    }

    function subSaveHide() {
        $("#sub_edit").hide();
        document.getElementById('subNameInput').value = "";
    }

    function onSubmit() {
    	if (subMenuFlag) //Add sub menu
		{
	    	name = document.getElementById('subNameInput').value;
		}
		if (menuFlag) //Add menu
		{
			name = document.getElementById('nameInput').value;
		}

        var url = "index.php?r=Menu/Create";
        var data = {menuName:name, parent_id:parent_id, edit_id:edit_id};
        //alert("edit_id:"+edit_id+",parent_id:"+parent_id+",name:"+name);
        submit(url,data);
 
    	if (subMenuFlag) //Add sub menu
		{
	    	document.getElementById('subNameInput').value = "";
	    	subMenuFlag = false;
		}

		if (menuFlag) //Add menu
		{
	        document.getElementById('nameInput').value = "";
	        menuFlag = false;
		}

	    parent_id = 0;
	    edit_id = 0;
    }

    function add(obj) {
    	parent_id = obj.title;//when add a sub menu we need its parent_id.
        $("#sub_edit").show();
        $("#edit").hide();
        subMenuFlag = true;
    }

    function delMenu(obj) {
        var id = obj.title;
        var url = "index.php?r=Menu/Delete";
        var data = 'id='+id;
        submit(url,data);
    }
    function applyToWX()
    {
        location.href = "index.php?r=Menu/applyToWX";
    }

    function submit(url,data)
    {
        $.ajax({
            type:"POST",//请求的类型
            url:url,//接受请求的页面
            data: data,//传的数据
            //成功后回调的函数 
            success: function(msg){
                alert( "Operation is successful!");
            }
        });
        location.href = "index.php?r=menu";
    }
</script>