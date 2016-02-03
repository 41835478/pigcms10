<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset={:C('DEFAULT_CHARSET')}" />
		<title>网站后台管理 Powered by pigcms.com</title>
		<script type="text/javascript">
			<!--if(self==top){window.top.location.href="<?php echo U('Index/index');?>";}-->
			var kind_editor=null,static_public="<?php echo ($static_public); ?>",static_path="<?php echo ($static_path); ?>",system_index="<?php echo U('Index/index');?>",choose_province="<?php echo U('Area/ajax_province');?>",choose_city="<?php echo U('Area/ajax_city');?>",choose_area="<?php echo U('Area/ajax_area');?>",choose_circle="<?php echo U('Area/ajax_circle');?>",choose_map="<?php echo U('Map/frame_map');?>",get_firstword="<?php echo U('Words/get_firstword');?>",frame_show=<?php if($_GET['frame_show']): ?>true<?php else: ?>false<?php endif; ?>;
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo ($static_path); ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo ($static_path); ?>css/jquery.ui.css" />
		<script type="text/javascript" src="<?php echo C('JQUERY_FILE');?>"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/plugin/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/plugin/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/date/WdatePicker.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/jquery.colorpicker.js"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/common.js"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/date.js"></script>
		</head>
		<body width="100%" 
		<?php if($bg_color): ?>style="background:<?php echo ($bg_color); ?>;"<?php endif; ?>
> 
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="<?php echo U('User/index');?>" class="on">用户列表</a>
				</ul>
			</div>
			<table class="search_table" width="100%">
				<tr>
					<td>
						<form action="<?php echo U('User/index');?>" method="get">
							<input type="hidden" name="c" value="User"/>
							<input type="hidden" name="a" value="index"/>
							筛选: <input type="text" name="keyword" class="input-text" value="<?php echo ($_GET['keyword']); ?>"/>
							<select name="searchtype">
								<option value="uid" <?php if($_GET['searchtype'] == 'uid'): ?>selected="selected"<?php endif; ?>>用户ID</option>
								<option value="nickname" <?php if($_GET['searchtype'] == 'nickname'): ?>selected="selected"<?php endif; ?>>昵称</option>
								<option value="phone" <?php if($_GET['searchtype'] == 'phone'): ?>selected="selected"<?php endif; ?>>手机号</option>
							</select>
							<input type="submit" value="查询" class="button"/>
						</form>
					</td>
				</tr>
			</table>
			<form name="myform" id="myform" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col width="180" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>ID</th>
								<th>昵称</th>
								<th>手机号</th>
                                <th>店铺数量</th>
								<th>最后登录时间</th>
								<th>最后登录IP</th>
								<th class="textcenter">状态</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($user_list)): if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($vo["uid"]); ?></td>
										<td><?php echo ($vo["nickname"]); ?></td>
										<td><?php echo ($vo["phone"]); ?></td>
                                        <td><?php if ($vo['stores'] > 0) { ?><a href="javascript:;" href="javascript:void(0);" style="color: #3865B8" onclick="window.top.artiframe('<?php echo U('User/stores',array('id' => $vo['uid'], 'frame_show' => true));?>','商家“<?php echo ($vo["nickname"]); ?>”的店铺',750,700,true,false,false,false,'detail',true);"><?php echo ($vo["stores"]); ?></a><?php } else { ?>0<?php } ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$vo["last_time"])); ?></td>
										<td><?php echo ($vo["last_ip_txt"]); ?></td>
										<td class="textcenter"><?php if($vo['status'] == 1): ?><font color="green">正常</font><?php else: ?><font color="red">禁止</font><?php endif; ?></td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('<?php echo U('User/edit',array('uid'=>$vo['uid']));?>','编辑用户信息',620,360,true,false,false,editbtn,'edit',true);">编辑</a>&nbsp;|&nbsp;<a href="<?php echo U('tab_store',array('uid'=>$vo['uid']));?>" target="_blank">进入店铺</a></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								<tr><td class="textcenter pagebar" colspan="9"><?php echo ($pagebar); ?></td></tr>
							<?php else: ?>
								<tr><td class="textcenter red" colspan="8">列表为空！</td></tr><?php endif; ?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</body>
</html>