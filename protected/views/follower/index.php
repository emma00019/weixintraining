
<h1>Manage Followers</h1>
    <table class="table" cellspacing="0">
        <thead class="thead">
            <tr>
                <th class="table_cell">序号</th>
                <th class="table_cell">微信号</th>
                <th class="table_cell">操作</th>
            </tr>
        </thead>

            <tbody class="tbody">
            <?php
            for ($i=0; $i < count($models); $i++) {
            ?>
                <tr openid="<?php echo $models[$i];?>">
                    <th class="table_cell"><?php echo $i + 1;?></th>
                    <th class="table_cell"><?php echo $models[$i];?></th>
                   <form action="index.php?r=Follower/View" method="POST">
                    <th class="viewDetail table_cell" >
                        <input id = "<?php echo $models[$i];?>" value="<?php echo $models[$i];?>" name="openid" style="display:none"/>
                        <button>查看</button>
                    </th>
                   </form>
                </tr>
            <?php
            }
            ?>
            </tbody>
    </table>
    <!--
<script src="/../../../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
    function view(obj) {
        var openid = obj.id;
        var url = "index.php?r=Follower/View";
        var data ={openid:openid};
        submit(url,data);
    }

    function submit(url,data)
    {
        $.ajax({
            type:"POST",//请求的类型
            url:url,//接受请求的页面
            data: data,//传的数据
            // dataType:'json',
            //成功后回调的函数
            success: function(msg){
                alert( "Operation is successful!");
                console.log(msg);
            }
        });
        //location.href = "index.php?r=follower/view";
    }
</script> -->
