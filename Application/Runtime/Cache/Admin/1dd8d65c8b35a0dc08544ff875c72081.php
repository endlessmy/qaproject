<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> Case</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/qaweb/Public/ztree/css/demo.css" type="text/css">
    <link rel="stylesheet" href="/qaweb/Public/ztree/css/awesomeStyle/awesome.css" type="text/css">
    <script type="text/javascript" src="/qaweb/Public/assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.excheck.js"></script>
    <script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.exedit.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/qaweb/Public/assets/i/app-icon72x72@2x.png">
    <link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
    <style>
        .am-form-group{
            display: block;
            margin: 5px auto 0 auto;
            border-radius: 0;
            padding: 5px;
            line-height: 1.8rem;
            width: 80%;
            border: 1px solid #dedede;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
        }
        div#rMenu {position:absolute; visibility:hidden; top:0;text-align: left;padding: 2px;}
        div#rMenu ul li{
            margin: 1px 0;
            padding: 0 5px;
            cursor: pointer;
            list-style: none outside none;
            background-color: #DFDFDF;
        }
		.blo{
			display:block;
		}
		.non{
			display:none;
		}

    </style>
</HEAD>
<body>
<div class="am-cf admin-main am-padding-top-0">
    <!-- content start -->
    <div class="admin-content" id="content">
        <div class="am-cf am-padding am-padding-bottom-0" id="content-body">
            <div class="am-g">
                <div class="am-fl am-cf" id="html_title"><strong class="am-text-primary am-text-lg">Task</strong> / <?php echo ($task_info[name]); ?></div><br/>
                <button type='button' style="float:right;" class='am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger'  onclick='add()'> <span class='am-icon-pencil-square-o'></span>new Task</button>
            </div>
        </div>
        <br/>
        <!--Task case--->
        <div class="am-g" style="padding-left:10px;">
           <div class="container" id="edit_page">
              <div class="am-g">
                <div class="am-u-md-12">   
                         <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-title"><a href="javascript:reorder('name');">CaseName</a></th>
                                <th class="table-title"><a href="javascript:reorder('pid');">ItemName</a></th>
                                <th class="table-title"><a href="javascript:reorder('suit');">ItemUnit</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                                <td><?php echo ($v[case_name]); ?></td>
                                <td><?php echo ($v[item_name]); ?></td>
                                <td><?php echo ($v[item_unit]); ?></td>
                            </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                       
                           
                    </div>
                </div>
            </div>
        </div>


<div class="am-modal am-modal-confirm" id="add_task_modal" style="top:-20%;" tabindex="<?php echo ($v[id]); ?>">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Task</div>
        <div class="am-modal-bd">
          <label style="display:inline;">Name:</label>
          <input type="text" class="am-modal-prompt-input" id="add_name" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
          <label style="display:inline;">Driver:</label>
          <input type="text" class="am-modal-prompt-input" id="add_driver" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
          <label style="display:inline;margin-left:10px;">Type:</label>
          <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
              <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." onchange="add_type(this)" id="add_type" style="border:1px solid #9C9898;">
                  <option value="CModel">CModel</option>
                  <option value="Chip">Chip</option>
                  <option value="FPGA">FPGA</option>
              </select>
          </div><br/><br/>
          <label style="display:inline;margin-left:-17px;">Test Run:</label> 
          <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
             <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." id="add_pid" style="border:1px solid #9C9898;">
                <option value=""></option>
                <?php if(is_array($run_list)): foreach($run_list as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
             </select>
          </div><br/><br/>
          <label style="display:inline;margin-left:2px;">Board:</label>
          <div class="am-form-group-inline" style="display:inline;text-align:center;" id="Chip_selected_add">
              <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary',searchBox: 1}"   class="am-fr" placeholder="Please select..." id="add_platform">
                <option value=""></option>
                <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): ?><option value=<?php echo ($vc['Name']); ?>><?php echo ($vc[Name]); ?></option>
                {else if condition="$vc[Type]==CModel"}<?php endforeach; endif; ?>
             </select>
             <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"  onchange="add_os(this)" ov_id=<?php echo ($v[id]); ?> class="am-fr" placeholder="Please select OS..." id="add_os">
                  <option value=""></option>
                  <?php if(is_array($os_list)): foreach($os_list as $key=>$vc): if($vc==$v[OS]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
                  <?php else: ?>
                  <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
            </select>
            <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select OS..." id="add_version">
                  <option value=""></option>
            </select>
            <br/><br/>
            </div>
             <div class="am-form-group-inline" style="display:none;text-align:center;" id="CModel_selected_add">
             <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary',searchBox: 1}"   class="am-fr" placeholder="Please select..." id="add_platform2">
             	 <option value=""></option>
            	 <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): if($vc[Type]==CModel): ?><option value=<?php echo ($vc['Name']); ?>><?php echo ($vc[Name]); ?></option><?php endif; endforeach; endif; ?>
       	     </select>
        	<select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select OS..." id="add_version2">
            <option value=""></option>
            <?php if(is_array($scm)): foreach($scm as $key=>$vscm): ?><option value=<?php echo ($vscm); ?>><?php echo ($vscm); ?></option><?php endforeach; endif; ?>
       	    </select>
       	    <br/><br/> 
            </div> 
            <label style="display:inline;margin-left:10px;">Suite:</label> 
            <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
            <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." id="add_suit" style="border:1px solid #9C9898;">
                <option value=""></option>
                <?php if(is_array($suit_list)): foreach($suit_list as $key=>$vc): ?><option value="<?php echo ($vc); ?>"><?php echo ($vc); ?></option><?php endforeach; endif; ?>
            </select>
            </div><br/><br/>   
            <label style="display:inline;">Owner:</label>
            <div class="am-form-group-inline" style="display:inline;">
                <select data-am-selected="{btnWidth: '58%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select..." id="add_user">
                    <option value=""></option>
                    <?php if(is_array($user_list)): foreach($user_list as $k=>$vc): ?><option value="<?php echo ($vc[username]); ?>"><?php echo ($vc[username]); ?></option><?php endforeach; endif; ?>
                </select>
            </div><br/><br/>
            <label style="display:inline;margin-left:-33px;">start_time:</label>
            <input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_start" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
            <label style="display:inline;margin-left:-5%;">end_time:</label>
            <input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_end" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">        
        </div>

        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #9C9898;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #9C9898;">Cancel</span>
        </div>
    </div>
</div>



<script >
function add() {
    var start_time="<?php echo ($run_info[start_time]); ?>";
    var end_time="<?php echo ($run_info[end_time]); ?>";
    $("#add_name").val("");
    $("#add_platform").val("");
    $("#add_user").val("");
    $("#add_suit").val('');
    $("#add_pid").val("");
    $("#add_type").val("");
    $("#add_os").val("");
    $("#add_version").val("");   
    $("#add_driver").val("");   
    $("#add_start").attr({value:start_time});
    $("#add_end").attr({value:end_time});
    $("#add_task_modal").modal({
        relatedTarget:this,
        onConfirm:function(e){
            var pid=$("#add_pid").val();
            board_val=$("#add_platform").val()?$("#add_platform").val():$("#add_platform2").val();
            version_val=$("#add_version").val()?$("#add_version").val():$("#add_version2").val();
            if(pid!=null&&pid!=""&&pid!=0){
                var arr={name:e.data['0'],driver:e.data['1'],start_time:e.data['2'],end_time:e.data['3'],board:board_val,owner:$('#add_user').val(),Type:$('#add_type').val(),suit:$('#add_suit').val(),pid:$("#add_pid").val(),OS:$('#add_os').val(),Version:version_val};
                $.post("<?php echo U('Admin/Task/add');?>",arr,function (data) {
                    location.href=("<?php echo U('Admin/Task/case_index',array('tid'=>ttid));?>").replace('ttid',data);
                });
            }else{
                alert('Please choose the Test Run');
            }

        },
        onCancel:function (e) {
            e.close()
        }
    });
}
</script>

    <div id="rMenu">
        <ul>
            <li id="reassign" onclick="reassign();">Reassign</li>
            <li id="all_result" onclick="set_result();">Batch set result</li>
        </ul>
    </div>

<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>


</body>
</HTML>