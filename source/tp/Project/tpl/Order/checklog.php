<include file="Public:header"/>	<style type="text/css">		.date-quick-pick {			display: inline-block;			color: #07d;			cursor: pointer;			padding: 2px 4px;			border: 1px solid transparent;			margin-left: 12px;			border-radius: 4px;			line-height: normal;		}		.date-quick-pick.current {			background: #fff;			border-color: #07d!important;		}		.date-quick-pick:hover{border-color:#ccc;text-decoration:none}	</style>		<div class="mainbox">			<div id="nav" class="mainnav_title">				<ul>					<a href="{pigcms{:U('Order/checklog')}" class="on">订单列表</a>				</ul>			</div>			<table class="search_table" width="100%">				<tr>					<td>						<form action="{pigcms{:U('Order/checklog')}" method="get">							<input type="hidden" name="c" value="Order" />							<input type="hidden" name="a" value="checklog" />						   	 筛选: <input type="text" name="keyword" class="input-text" value="{pigcms{$_GET['keyword']}" />							<select name="type">							<option value="realname" <if condition="$_GET['type'] eq 'realname'">selected="selected"</if>>管理员姓名</option>								<option value="account" <if condition="$_GET['type'] eq 'account'">selected="selected"</if>>管理员登陆账户名</option>															</select>																					<!-- 							&nbsp;&nbsp;下单时间： --><!-- 							<span class="date-quick-pick" data-days="7">最近7天</span> --><!-- 							<span class="date-quick-pick" data-days="30">最近30天</span> --> 							<input type="submit" value="查询" class="button"/>						</form>					</td>				</tr>			</table>			<form name="myform" id="myform" action="" method="post">				<div class="table-list">					<table width="100%" cellspacing="0">						<colgroup>							<col/>							<col/>							<col/>							<col/>							<col/>							<col width="180" align="center"/>						</colgroup>						<thead>							<tr>								<th width="150">标记号</th>								<th>订单id</th>								<th>操作人信息</th>								<th>操作信息描述</th>								<th>IP</th>								<th>操作的时间</th>															</tr>						</thead>						<tbody>							<if condition="is_array($array)">								<volist name="array" id="arr">									<tr>										<td>{pigcms{$arr.id}</td>										<td>订单id：{pigcms{$arr.order_id}<br/>订单no：{pigcms{$arr.order_no}</td>										<td>{pigcms{$arr.linkman}																																																												{pigcms{$arr.realname}<BR/>										用户名:{pigcms{$arr.account}<br/>										最后登录ip: {pigcms{$arr.last_ip|long2ip=###}<BR/>																														</td>										<td>{pigcms{$arr.desciption}</td>										<td>{pigcms{$arr.ip|long2ip=###}</td>																				<td>{pigcms{$arr.timestamp|date='Y-m-d H:i:s',###}</td>																																																											</tr>								</volist>								<tr>									<td class="textcenter pagebar" colspan="10">{pigcms{$page}</td>								</tr>							<else/>								<tr><td class="textcenter red" colspan="10">列表为空！</td></tr>							</if>						</tbody>					</table>				</div>			</form>		</div><include file="Public:footer"/>