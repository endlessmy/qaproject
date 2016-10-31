<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta  charset="utf-8">
    <title>管理中心-修改配置</title>
    
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
    <!-- 主容器 start -->
    <div id="container" class="container-fluid">
      <div class="row-fluid">

<!-- 左侧导航栏 start -->
<div id="sideBar" class="span2">
  <ul class="nav nav-tabs nav-stacked" id="admin-menu-bar">
  	
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
<!-- 主内容 start -->
<div id="content" class="span10">
  <!-- 标题 start -->
  <div class="pageTit page-header">
    <h1>编辑<small>在这里编辑社区信息</small></h1>
    <div class="opt">
    </div>
  </div>
  <!-- 标题 end -->
  <!-- 内容区块 start -->
  <div class="formBox">
      <form id="addform" action="<?php echo U('Admin/Config/save');?>" method="post" enctype="multipart/form-data">
      <input name="id" type="hidden" value="" />
        <!-- 标题 -->
        <div class="control-group">
          <label>网站名称：(<font color="red">20个汉字以内</font>)</label>
          <input type="text" name="site_name" value="<?php echo get_config_value('site_name');?>" datatype="s2-20" nullmsg="请填写网站名称！" errormsg="网站名称至少2个最多20个汉字！" />
          <span class="Validform_checktip"></span>
        </div>
		
		<div class="control-group">
          <label>网站风格：(<font color="red">请确认Template目录下存在此风格目录</font>)</label>
<input type="text" name="site_style" value="<?php echo get_config_value('site_style');?>" class="form-control js_site_style" placeholder="" datatype="s2-50" nullmsg="请填写网站风格！" errormsg="请输入2-50数字或字母" />         
          <span class="Validform_checktip"></span>
        </div>
        
		<div class="control-group">
          <label>站点关键字：(<font color="red">多个关键字请用逗号隔开</font>)</label>
<input type="text" name="site_keywords" value="<?php echo get_config_value('site_keywords');?>" class="form-control js_site_keywords" placeholder="多个关键字请用逗号隔开" datatype="*2-50" errormsg="请输入2-50数字或字母" "="">          
          <span class="Validform_checktip"></span>
        </div>
		
        <div class="control-group">
          <label>站点描述：</label>
<input type="text" name="site_descript" value="<?php echo get_config_value('site_descript');?>" style="width:50%" class="form-control js_site_descript" placeholder="站点描述" datatype="*2-50" errormsg="请输入2-50数字或字母" "="">          
          <span class="Validform_checktip"></span>
        </div>
		
        <div class="control-group">
          <label>版权信息：</label>
<input type="text" name="site_copyright" style="width:50%" value="<?php echo get_config_value('site_copyright');?>" class="form-control js_site_copyright" placeholder="" datatype="*2-50" errormsg="请输入2-50数字或字母" "="">          
          <span class="Validform_checktip"></span>
        </div>
		
        <div class="control-group">
          <label>网站logo：(<font color="red">尺寸120px*40px,建议背景为白色的png格式图片</font>)</label>
          <img id="js_logobox" src="<?php echo get_config_value('site_logo');?>" alt="点击更换LOGO" width="100px">
          <input id="js_upload" name="site_logo" type="file" value="">        
          <span class="Validform_checktip"></span>
        </div>

        <div class="control-group">
          <img style="display:none;" src="images/loading.gif" />
          <input type="submit" class="btn btn-primary Sub" value="保存" />
        </div>
    </form>
  </div>
  <!-- 内容区块 end -->
</div>
<!-- 主内容 end -->
<script>
$(function(){
  //提交表单合法性验证 
  $("#addform").Validform({ 
    tiptype:function(msg,o,cssctl){ 
      if(!o.obj.is("form")){ 
          var objtip=o.obj.siblings(".Validform_checktip");
          cssctl(objtip,o.type);
          objtip.text(msg); 
      }
    },
 
  });
})
</script>
   
      </div>
    </div>
    <!-- 主容器 end -->
﻿    <!-- 脚部 start -->
    <div id="footer">
        Copyright ©2015-2016 VeriSilicon版权所有
    </div>
    <!-- 脚部 end -->
  </body>
</html>