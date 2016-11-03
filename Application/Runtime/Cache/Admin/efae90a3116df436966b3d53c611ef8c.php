<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> ZTREE DEMO - awesome 风格</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Include font-awesome here, CDN is ok, or locally installed by bower to your project -->

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
    <SCRIPT type="text/javascript">
        var setting = {
            view: {
                dblClickExpand: true
            },
            check: {
             enable: true,
             chkboxType:{ "Y" : "s", "N" : "ps" }
             },
            data: {
                simpleData: {
                    enable: true
                }
            },

            callback: {
                onClick:onClick,
            }
        };

        var zNodes =[{id:0,pId:0,name:'root',open:true,isParent:true}];
        $.each(<?php echo ($class); ?>,function (k,v) {
            if(v.id<10)
                var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:true,isParent:true};
            else
                var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:false,isParent:true};
            zNodes.push(temp);
        })
        $.each(<?php echo ($tree_data); ?>,function (k,v) {
            var temp={id:v.id+1000-1000,pId:v.pid,name:""+v.CaseName,open:true,isParent:false};
            zNodes.push(temp);
        })


        function onClick(event, treeId, treeNode) {
            if(treeNode.checked){
                zTree.checkNode(treeNode,false);
            }else{
                zTree.checkNode(treeNode,true);
            }

        }

        //对应功能区

        var zTree;
        $(document).ready(function(){
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            zTree = $.fn.zTree.getZTreeObj("treeDemo");

        });

    </SCRIPT>
    <style type="text/css">
        div#rMenu {position:absolute; visibility:hidden; top:0;text-align: left;padding: 2px;}
        div#rMenu ul li{
            margin: 1px 0;
            padding: 0 5px;
            cursor: pointer;
            list-style: none outside none;
            background-color: #DFDFDF;
        }
    </style>
</HEAD>
<BODY>
<div class="am-cf admin-main am-padding-top-0">
    <!-- content start -->

    <div class="admin-content">
        <div class="am-cf am-padding am-padding-bottom-0" id="content-body">
            <div class="am-fl am-cf" id="html_title"><strong class="am-text-primary am-text-lg">Task Suite</strong></div>
        </div>
    <div class="am-g">
     <div class="am-u-md-3" style="margin-top:40px;">
        <div class="container" id="tree_btn">
            <div class="zTreeDemoBackground left">
                <ul id="treeDemo" class="ztree" style="height: auto; border: hidden;overflow:auto;" ></ul>
                <div class="am-btn-toolbar" style="margin-left:3px;">
                    <div class="am-btn-group am-btn-group-md">
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="edit()"><span class="am-icon-pencil" ></span>&nbsp;Save</button>
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="cancel()"><span class="am-icon-pencil" ></span>&nbsp;Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g" style="margin-left:10px;">
        <div class="container" id="edit_page">
            <div class="am-g">
                <div class="am-u-md-8">
                    <button type='button' class='am-btn am-btn-default am-btn-xs am-text-secondary am-text-primary am-fr'  onclick='add(this)'> <span class='am-icon-pencil-square'></span>&nbsp;new Suite</button><br/>
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title">name</th><th class="table-author am-hide-sm-only am-fr">Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$v): if($v[name]!='user_defined'): ?><tr>
                            <td><a href="javascript:check('<?php echo ($v[id]); ?>','<?php echo ($v[cids]); ?>')"><?php echo ($v[name]); ?></a></td>
                            <td>
                                <div class="am-btn-toolbar am-fr">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary" shot_id=<?php echo ($v[id]); ?> onclick="rename(this)"><span class="am-icon-pencil-square"></span> Rename</button>
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" shot_id=<?php echo ($v[id]); ?> onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr><?php endif; endforeach; endif; ?>
                        </tbody>
                    </table>
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<div class="am-modal am-modal-confirm" id="shot_edit_name" style="top:-30%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New/Rename Suite</div>
        <div class="am-modal-bd">
            <label style="display:inline;">Name:</label>
            <input type="text" class="am-modal-prompt-input" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;"">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;"">Cancel</span>
        </div>
    </div>
</div>
<script>
    var nodeid=-1;
    $(document).ready(function () {
        zTree.setting.check.chkboxType = { "Y" : "ps", "N" : "ps" };

    });
    function check(id,cids) {
        $('#tree_btn').show();
        nodeid=id;
        zTree.checkAllNodes(false);
        if(cids!=''){
            cids=cids.split(',');
            $.each(cids,function (k,v) {
                var node=zTree.getNodesByParam('id',v+"0000");
                zTree.checkNode(node['0'],true,true);
            });
        }

    }
    function del(obj) {
        var id=$(obj).attr('shot_id');
        if(confirm('Do you want delete this shot ?')){
            $.post("<?php echo U('Admin/Task/shot_del');?>",{id:id},function (data) {
               location.href="<?php echo U('Admin/Task/shot_index');?>";
            });
        }
    }

    function edit() {
        if(nodeid!=-1){
            var nodes=zTree.getCheckedNodes();
            var cids=new Array();
            $.each(nodes,function (k,v) {
                if(v.id>10000)
                    cids.push(parseInt(v.id/10000));
            });
            cids=cids.sort().join(',');
            $.post("<?php echo U('Admin/Task/shot_edit');?>",{id:nodeid,cids:cids},function (data) {
                location.href="<?php echo U('Admin/Task/shot_index');?>";
            });
        }

    }

    function cancel() {
        if(nodeid!=-1){
            var arr =eval('<?php echo json_encode($list);?>');
            zTree.checkAllNodes(false);
            $.each(arr,function (k,v) {
                if(v.id==nodeid){
                   check(v.id,v.cids);
                    return false;
                }
            });
        }
    }
    function rename(obj) {
        var id=$(obj).attr('shot_id');
        $("#shot_edit_name").modal({
            relatedTarget:this,
            onConfirm:function(e){
                $.post("<?php echo U('Admin/Task/shot_edit');?>",{id:id,name:e.data},function (data) {
                    location.href="<?php echo U('Admin/Task/shot_index');?>";
                });
            },
            onCancel:function (e) {
                e.close()
            }
        });
    }
    function add() {
        $("#shot_edit_name").modal({
            relatedTarget:this,
            onConfirm:function(e){
                $.post("<?php echo U('Admin/Task/shot_edit');?>",{name:e.data},function (data) {
                    check(data,'');
                });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
</script>

<div class="am-modal am-modal-confirm" tabindex="edit_add_class" id="edit_add_class">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Class Add/Edit</div>
        <div class="am-modal-bd">
            <label>Input Classfication Name</label>
            <input type="text" class="am-modal-prompt-input" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_class">
    <div class="am-modal-dialog">

        <div class="am-modal-bd">
            是否删除该分类及子Case
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_modal">
    <div class="am-modal-dialog">

        <div class="am-modal-bd">
            是否删除该Case
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>


<div id="rMenu">
    <ul>
        <li id="m_add" onclick="add_class();">Add subfolder</li>
        <li id="m_del" onclick="del_class();">Delete folder</li>
        <li id="m_check" onclick="edit_class();">Edit folder</li>
        <li id="m_unCheck" onclick="add_case();">Add Case</li>
    </ul>
</div>

<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>

</BODY>
</HTML>