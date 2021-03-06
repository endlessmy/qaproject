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
	<link rel="icon" type="image/png" href="/Amaze/Public/assets/i/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="/Amaze/Public/assets/i/app-icon72x72@2x.png">
	<meta name="apple-mobile-web-app-title" content="Amaze UI" />
	<link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
	<link rel="stylesheet" href="/Amaze/Public/assets/css/admin.css">
</head>
<body>


<!-- content start -->
<div class="admin-content">
	<div class="admin-content-body">
		<div class="am-cf am-padding am-padding-bottom-0">
			<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Table</strong> / <small>OS_Version</small></div>
			<div class="am-u-sm-offset-5 am-cf"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger"  onclick="add()">
				<span class="am-icon-pencil-square-o"></span>new OS_Version</button></div>
		</div>
		<div class="am-g">
			<div class="am-u-sm-7">
					<table class="am-table am-table-striped am-table-hover table-main">
						<thead>
						<tr>
							<th class="table-title">id</th><th class="table-title">OS</th><th class="table-title">Version</th><th class="table-author am-hide-sm-only">Operation</th>
						</tr>
						</thead>
						<tbody>
						<?php if(is_array($OS_Version)): foreach($OS_Version as $key=>$v): ?><tr>
							<td><?php echo ($v[id]); ?></td>
							<td><?php echo ($v[OS]); ?></td>
							<td><?php echo ($v[Version]); ?></td>
							<td>
								<div class="am-btn-toolbar">
										<div class="am-btn-group am-btn-group-xs">
											<button class="am-btn am-btn-default am-btn-xs am-text-secondary" ov_id="<?php echo ($v[id]); ?>" ov_os="<?php echo ($v[OS]); ?>" onclick="edit_version(this)"><span class="am-icon-pencil-square"></span> Edit Version</button>
											<div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" >
												<div class="am-modal-dialog">
													<div class="am-modal-hd">Delete Version</div>
													<div class="am-modal-bd">
														Please input new Version
														<table>
															<?php if(is_array($v['version_list'])): $k = 0; $__LIST__ = $v['version_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($k % 2 );++$k; if($k%4==1): ?><tr><?php endif; ?>
															<td align="left"><label class="am-checkbox" ><input type="checkbox" value=<?php echo ($vsub); ?> data-am-ucheck > <?php echo ($vsub); ?> </label></td>
															<?php if($k%4==4): ?></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
														</table>
													</div>
													<div class="am-modal-footer">
														<span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
														<span class="am-modal-btn" data-am-modal-confirm style="width: 50%">Delete</span>
													</div>
												</div>
											</div>
										<button class="am-btn am-btn-default am-btn-xs am-text-secondary" ov_id="<?php echo ($v[id]); ?>" ov_os="<?php echo ($v[OS]); ?>" onclick="add_version(this)"><span class="am-icon-plus"></span> Add Version</button>
										<button class="am-btn am-btn-default am-btn-xs am-hide-sm-only" ov_id="<?php echo ($v[id]); ?>" ov_os="<?php echo ($v[OS]); ?>" onclick="rename(this)"><span class="am-icon-copy" ></span> Rename</button>
										<button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" ov_id="<?php echo ($v[id]); ?>" ov_os="<?php echo ($v[OS]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
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
<!-- content end -->
			//add_version modal
			<div class="am-modal am-modal-confirm" tabindex="add_version_modal" id="add_version_modal" >
				<div class="am-modal-dialog">
					<div class="am-modal-hd">Add Version</div>
					<div class="am-modal-bd">
						Please input new Version
						<input type="text" class="am-modal-prompt-input" >
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
						<span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
					</div>
				</div>
			</div>

			//rename_os_modal
			<div class="am-modal am-modal-confirm" tabindex="add_version_modal" id="rename_os_modal" >
				<div class="am-modal-dialog">
					<div class="am-modal-hd">Rename OS</div>
					<div class="am-modal-bd">
						Please input
						<input type="text" class="am-modal-prompt-input" >
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
						<span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
					</div>
				</div>
			</div>

			//add new OS_version
			<div class="am-modal am-modal-confirm" tabindex="add_os_version_modal" id="add_os_version_modal" >
				<div class="am-modal-dialog">
					<div class="am-modal-hd">New OS_Version</div>
					<div class="am-modal-bd">
						OS Name
						<input type="text" class="am-modal-prompt-input" >
						Version <strong class="am-text-danger am-text-lg">(split every version with ',')</strong>
						<input type="text" class="am-modal-prompt-input" >
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
						<span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
					</div>
				</div>
			</div>
</div>




<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Amaze/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Amaze/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Amaze/Public/assets/js/amazeui.min.js"></script>
<script src="/Amaze/Public/assets/js/app.js"></script>
<script>
	function add_version(obj) {
		var os=$(obj).attr('ov_os');
		$('#add_version_modal').modal({
			relatedTarget: this,
			onConfirm:function (e) {
				$.post("<?php echo U('Admin/Osversion/edit');?>",{Version:e.data,OS:os,add:true},function (data) {
					location.href="<?php echo U('Admin/Osversion/index');?>";
				});
			},
			onCancel:function (e) {
				e.close();
			}
		});

	}
	function edit_version(obj) {
		var os=$(obj).attr('ov_os');
		var id=$(obj).attr('ov_id');
		var str=(".am-modal[tabindex='id']").replace("id",id);
		var version=$(obj).attr('ov_version');
		$(str).modal({
			relatedTarget: this,
			onConfirm:function () {
				version=$(str+" input[type=checkbox]:checked").map(function(){return this.value}).get().join(',');
				$.post("<?php echo U('Admin/Osversion/edit');?>",{Version:version,OS:os},function (data) {
					location.href="<?php echo U('Admin/Osversion/index');?>";
				});
			},
			onCancel:function (e) {
				e.close();
			}
		});

	}
	function rename(obj) {
		var id=$(obj).attr('ov_id');
		var os=$(obj).attr('ov_os');
		$('#rename_os_modal').modal({
			relatedTarget: this,
			onConfirm:function (e) {
				$.post("<?php echo U('Admin/Osversion/edit');?>",{OS:os,newos:e.data},function (data) {
					location.href="<?php echo U('Admin/Osversion/index');?>";
				});
			},
			onCancel:function (e) {
				e.close();
			}
		});

	}
	function del(obj) {
		var id=$(obj).attr('ov_id');
		var os=$(obj).attr('ov_os');
		if(confirm('确定删除？')){
			$.post("<?php echo U('Admin/Osversion/del');?>",{OS:os},function () {
				window.location.href="<?php echo U('Admin/Osversion/index');?>";
			})
		}

	}
	function add() {
		$('#add_os_version_modal').modal({
			relatedTarget: this,
			onConfirm:function (e) {
				$.post("<?php echo U('Admin/Osversion/add');?>",{OS:e.data['0'],Version:e.data['1']},function (data) {
					location.href="<?php echo U('Admin/Osversion/index');?>";
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