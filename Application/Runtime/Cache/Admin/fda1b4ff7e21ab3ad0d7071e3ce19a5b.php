<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/qaweb/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
    <style>
    .edit{
        width:90%;
        margin:0 auto;
        text-align: left;
    }
    .edit label{
        width:130px;
        display:inline-block;
        text-align:right;
        padding:0px;
    }
    .edit input{
        width:60%;

    }
</style>
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Customer</strong></div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span> new Customer</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Customer</th><th class="table-title">Description</th><th class="table-title">PM_Contactor</th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[Name]); ?></td>
                        <td><?php echo ($v[Description]); ?></td>
                        <td><?php echo ($v[PM_Contactor]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" customer_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" style="top:-20%;">
                                        <div class="am-modal-dialog">
                                            <div class="am-modal-hd">Edit Customer</div>
                                            <div class="am-modal-bd edit">
                                              <label>Name: </label>
                                              <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[Name]); ?>" style="display:inline;border:1px solid #9C9898;"><br/><br/>
                                               <label>Description: </label> 
                                               <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[Description]); ?>" style="display:inline;border:1px solid #9C9898;"><br/><br/>
                                                <label>PM_Contactor: </label>
                                                <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[PM_Contactor]); ?>" style="display:inline;border:1px solid #9C9898;"> 
                                            </div>
                                            <div class="am-modal-footer">
                                                <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
                                                <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" customer_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
//add new board
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" style="top:-20%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Customer</div>
        <div class="am-modal-bd">
          <table style="width:100%;margin:5px 20px;">
            <tr>
              <td style="width:40px;text-align:right;"><label>Name:&nbsp;</label></td>
              <td><input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="Name"></td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="padding-top:10px;">Description:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="BuildNo">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="padding-top:10px;">PM_Contactor:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="BuildType">
              </td>
            </tr>
          </table>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
        </div>
    </div>
</div>
</div>




<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/qaweb/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/qaweb/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>
<script src="/qaweb/Public/assets/js/app.js"></script>
<script>
    function edit(obj) {
        var id=$(obj).attr('customer_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Customer/edit');?>",
                        {id:id,Name:e.data[0],Description:e.data[1],PM_Contactor:e.data[2]},
                        function () {
                            location.href="<?php echo U('Admin/Customer/index');?>";
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('customer_id');
        if(confirm('Delete This Customer ?')){
            $.post("<?php echo U('Admin/Customer/del');?>",{id:id},function (data) {
                window.location.href="<?php echo U('Admin/Customer/index');?>";
            })
        }

    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Customer/add');?>",
                        {Name:e.data[0],Description:e.data[1],PM_Contactor:e.data[2]},
                        function () {
                            location.href="<?php echo U('Admin/Customer/index');?>";
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }


</script>
</body>
</html>