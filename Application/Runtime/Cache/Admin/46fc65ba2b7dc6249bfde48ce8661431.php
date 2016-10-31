<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta  charset="utf-8">
    <title>管理中心-类别列表</title>
    
    <link  rel="stylesheet"  href="/ExpAndImp/Public/Css/admin.css"  type="text/css">
    <link  rel="stylesheet"  href="/ExpAndImp/Public/Css/bootstrap.css"  type="text/css">
    <link  rel="stylesheet"  href="/ExpAndImp/Public/Css/bootstrap_fix.css"  type="text/css">
    <link  rel="stylesheet"  href="/ExpAndImp/Public/Css/jquery-ui.min.css"  type="text/css">
    
    
    <script  type="text/javascript"  src="/ExpAndImp/Public/Js/jquery-1.8.3.min.js"></script>
    <script  type="text/javascript"  src="/ExpAndImp/Public/Js/Validform_v5.3.2_min.js"></script>
    <script  type="text/javascript"  src="/ExpAndImp/Public/Js/jquery-ui.min.js"></script>
    <script  type="text/javascript"  src="/ExpAndImp/Public/Js/jquery.cookie.js"></script>
    <script  type="text/javascript"  src="/ExpAndImp/Public/Js/jquery.ui.datepicker-zh-CN.js"></script>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    .row-fluid > .span2{ width:11%; }
    .row-fluid > .span10{ width:86%; }
    </style>

    
    <script  type="text/javascript">
      $(function(){
        //记录上次菜单折叠状态
        var clickMenu = $.cookie('sMenu');
        if (clickMenu == null) {
          clickMenu = 1;
        }
        $('.main-menu .main-menu-tit').each(function(i) {
          if (i != clickMenu) {
            $(this).next().css('display', 'none');
          }
          $(this).click(function() {
            if ($(this).next().css('display') == 'none') {
              $('.main-menu .main-menu-tit').next().slideUp('fast');
              $(this).next().slideDown('fast');
              $.cookie('sMenu', i, { expires: 3600 * 24 * 30, path: '/' });
            } else {
              $(this).next().slideUp('fast');
            }
          });
        });
      });
    </script>

    
    
  </head> 
  
  <body>
  <div  id="header"  class="navbar navbar-fixed-top">
      <div  class="navbar-inner">
        <div  class="container">
          <div><a  class="brand"  href="<?php echo U('admin/index/index');?>">QA内部网站管理中心</a></div>
          <div>
            <ul  class="nav pull-right">
                <li  id="navUserInfo">
                  <a  href="javascript:void(0);"  style="color:white;">欢迎您，<i  class="icon-user icon-white"></i>超级管理员&nbsp; </a>
                </li>
                <li  class="divider-vertical"  style="margin:0;"></li>
                <li>
                  <a  href="<?php echo U('Admin/Index/index');?>"  style="color:white;">后台首页</a>
                </li>
                <li>
                  <a  href="<?php echo U('Home/Index/index');?>"  target="_blank"  style="color:white;">网站首页</a>
                </li>
                <li  class="dropdown">
                  <a  href="<?php echo U('Admin/logout/index');?>"  class="dropdown-toggle"  data-toggle="dropdown"  style="color:white;">退出</a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <div  id="container"  class="container-fluid">
      <div  class="row-fluid">

<!-- 左侧导航栏 start -->
<div id="sideBar" class="span2">
  <ul class="nav nav-tabs nav-stacked" id="admin-menu-bar">
  	
  	<li class="active main-menu ">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-cog"></i>系统版本信息</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('OSVersion/index');?>" class="noborder">系统版本列表</a>
          </li> 
        </ul>
      </li>
      <li class="active main-menu ">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-cog"></i>Case信息</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Testcase/index');?>" class="noborder">Case信息</a>
          </li> 
        </ul>
      </li>
      <li class="active main-menu">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-list-alt"></i> 产品管理</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Goods/index');?>" class="noborder">产品列表</a>
            <a href="<?php echo U('Goods/export');?>" class="noborder">导出产品</a>
            <a href="<?php echo U('Goods/import');?>" class="noborder">导入产品</a>
          </li> 
        </ul>
      </li>

      <li class="active main-menu">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-th-large"></i> 品牌管理</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Brand/index');?>" class="noborder">品牌列表</a>
          </li> 
        </ul>
      </li>
	  
      <li class="active main-menu">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-tags"></i> 类别管理</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Category/index');?>" class="noborder">类别列表</a>
          </li> 
        </ul>
      </li>
	  
      <li class="active main-menu">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-random"></i> 机型管理</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Type/index');?>" class="noborder">机型列表</a>
          </li> 
        </ul>
      </li>	  
	  
      <li class="active main-menu ">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-lock"></i>安全管理</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Password/edit');?>" class="noborder">修改用户名/密码</a>
          </li> 
        </ul>
      </li>	
	    	        
      <li class="active main-menu ">
        <a href="javascript:void(0);" class="main-menu-tit"><i class="icon-cog"></i>系统设置</a>
        <ul class="nav nav-list sub-menu">
          <li class=""> 
            <a href="<?php echo U('Config/base');?>" class="noborder">基本设置</a>
          </li> 
        </ul>
      </li>
	  
      
  </ul>
</div>
<!-- 左侧导航栏 end -->

<div  id="content"  class="span10">
  <div  class="pageTit page-header">
    <h1>类别管理 </h1>
    <div  class="opt">
      <a  class="btn btn-info"  href="<?php echo U('admin/category/add');?>">添加类别</a>
    </div>
  </div>
  
  
  <div  class="dataBox">
    <table  class="table table-bordered table-striped center">
      <thead>
        <tr>
          <th>类名ID</th>
          <th>类别名称</th>
          <th>排序</th>
          <th>添加时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
          
        <?php if(is_array($category_list)): foreach($category_list as $key=>$vo): ?><tr>
          <td><a href="#"><?php echo ($vo["id"]); ?></a></td>
          <td><?php echo ($vo["title"]); ?></td>
          <td><?php echo ($vo["sort"]); ?></td>
          <td><?php echo ($vo["add_time"]); ?></td>
          <td>
          	<a title="编辑" class=" btn btn-mini btn-info js_edit" href="<?php echo U("admin/category/edit?id=$vo[id]");?>">编辑</a>
            <a title="删除" class=" btn btn-mini btn-danger js_del" href="<?php echo U("admin/category/del?id=$vo[id]");?>">删除</a>
          </td>
        </tr><?php endforeach; endif; ?>
           
        
      </tbody>
    </table>
  </div>

  
</div>
      </div>
    </div>
<script>
    $(function(){
        
    
    });
</script>    
﻿    <!-- 脚部 start -->
    <div id="footer">
        Copyright ©2015-2016 VeriSilicon版权所有
    </div>
    <!-- 脚部 end -->
  </body>
</html>