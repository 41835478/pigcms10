<include file="Public:header"/>	<script type="text/javascript" src="{pigcms{$static_path}js/jquery.fancybox-1.3.1.pack.js"></script>	<link rel="stylesheet" type="text/css" href="{pigcms{$static_path}css/fancybox.css" />	<style type="text/css">		a {			color:blue;		}		a, a:hover {			text-decoration: none;		}		.platform-tag {			display: inline-block;			vertical-align: middle;			padding: 3px 7px 3px 7px;			background-color: #f60;			color: #fff;			font-size: 12px;			line-height: 14px;			border-radius: 2px;		}	</style>	<script type="text/javascript">		$(function() {			//商品评价审核操作			$('.status-enable-hot > .cb-enable').click(function(){				if (!$(this).hasClass('selected')) {					var comment_id = $(this).data('id');					$.post("<?php echo U('Store/comment_status'); ?>",{'status': 1, 'id': comment_id}, function(data){})				}			})			$('.status-disable-hot > .cb-disable').click(function(){				if (!$(this).hasClass('selected')) {					var comment_id = $(this).data('id');					if (!$(this).hasClass('selected')) {						$.post("<?php echo U('Store/comment_status'); ?>", {'status': 0, 'id': comment_id}, function (data) {})					}				}			})				$(".show_more_img").each(function () {				if ($(this).find("a").size() == 0) {					return;				}				var rel = $(this).find("a").attr("rel");				$("a[rel=" + rel + "]").fancybox({					'titlePosition' : 'over',					'cyclic'        : false,					'titleFormat'	: function(title, currentArray, currentIndex, currentOpts) {						return '<span id="fancybox-title-over">' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';					}				});			});		})			</script>		<div class="mainbox">			<div id="nav" class="mainnav_title">				<ul>					<a href="{pigcms{:U('Store/comment')}" class="on">店铺评论列表</a>				</ul>			</div>			<table class="search_table" width="100%">				<tr>					<td>						<form action="{pigcms{:U('Store/comment')}" method="get">							<input type="hidden" name="c" value="Store"/>							<input type="hidden" name="a" value="comment"/>							&nbsp;&nbsp;评论属性：							<select name="isdelete">								<option value="">全部</option>								<option value="0" <if condition="$isdelete  eq '0'">selected</if> > 未删除的</option>								<option value="1" <if condition="$isdelete  eq '1'">selected</if>  >  已删除的</option>							</select>							<input type="submit" value="查询" class="button"/>						</form>					</td>				</tr>			</table>			<form name="myform" id="myform" action="" method="post">				<div class="table-list">					<style>					.table-list td{line-height:22px;padding-top:5px;padding-bottom:5px;}					.tables ul li{float:left;margin-left:10px;}					.tables thead th{text-align:center}					.tables tbody td{text-align:center}					</style>					<table class="tables" width="100%" cellspacing="0">						<thead>							<tr>								<th width="4%">删除</th>									<th width="12%">店铺信息</th>								<th width="12%" class="textcenter">评论人信息</th>								<th width="12%">评论的标签</th>								<th width="20%">评论内容</th>								<th width="10%">评论图片</th>								<!--th>分组</th-->								<th width="10%">当前审核状态</th>								<th width="10%">评论时间</th>								<th class="textcenter" width="10%">审核操作</th>							</tr>						</thead>						<tbody>							<if condition="is_array($comments)">								<volist name="comments[comment_list]" id="comment" key ="k">									<tr>										<if condition="$comment[delete_flg]  eq 1">										 	<td class="first_td">												已删除											</td>											<else/> 										 <td class="first_td">										 	<a url="<?php echo U('Store/comment_del', array('comment_id' => $comment['id'],'delete'=>1)); ?>"  class="delete_row"><img src="{pigcms{$static_path}images/icon_delete.png" width="18" title="删除" alt="删除" /></a> 										 </td>										 										</if> 										<td>											店铺id:<?php echo $comment['relation_id']; ?><br/>											店铺名称:<a href="javascript:void(0)"><?php echo $store_arr[$comment['relation_id']]['name']?></a>										</td>										<td class="textcenter">										<img src="<?php echo $comments['user_list'][$comment['uid']]['avatar'] ?>" width="60"/>										 昵称： <?php echo $comments['user_list'][$comment['uid']]['nickname'] ?>(ID:<?php echo $comments['user_list'][$comment['uid']]['uid'] ?>)																																			</td>										<td>										<ul>											<?php if(is_array($comments['comment_tag_list'][$comment['id']])) {?>												<?php foreach($comments['comment_tag_list'][$comment['id']] as $ks =>$v){ ?>													<li> <?php echo $v['name'];?> </li>												<?php }?>											<?php }?>											</ul>																	</td>										<td><?php echo $comment['content'] ?></td>										<td class="show_more_img">											<?php if(count($comment['attachment_list'])>0) {?>												<if condition="is_array($comment['attachment_list'])">													<volist name="comment['attachment_list']" id="attachment" >														 <a  rel="group{pigcms{$k}" href="<?php echo $attachment['file'];?>" title="展示">														 														 <img   href="<?php echo $attachment['file'];?>" title="展示" src="<?php echo $attachment['file'];?>" style="width:25px;height:25px;">&nbsp;														 														 </a>													</volist>												</if>											<?php }else {?>												暂无图片											<?php }?>										</td>																				<!--td>{pigcms{$product.group}</td-->										<td>										<if condition="$config['ischeck_to_show_by_comment'] eq '1'">											不需审核即可显示										<else/>											<?php if($comment['status'] == 1) {?>												通过审核											<?php } else {?>												未通过审核											<?php }?>										</if>																														</td>										<td><?php echo date('Y-m-d', $comment['dateline']); ?></td>										<td class="textcenter">										<if condition="$config['ischeck_to_show_by_comment'] eq '1'">											不需审核即可显示										<else/>												<center style="display:inline-block;text-align:center;margin:auto;padding:auto">												<span class="cb-enable status-enable-hot"><label class="cb-enable <if condition="$comment['status'] eq 1">selected</if>" data-id="<?php echo $comment['id']; ?>"><span>通过</span><input type="radio" name="status" value="1" <if condition="$comment['status'] eq 1">checked="checked"</if> /></label></span>												<span class="cb-disable status-disable-hot"><label class="cb-disable <if condition="$comment['status'] eq 0">selected</if>" data-id="<?php echo $comment['id']; ?>"><span>不通过</span><input type="radio" name="status" value="0" <if condition="$comment['status'] eq 0">checked="checked"</if>/></label></span>											</center>										</if>											</td>									</tr>								</volist>								<tr><td class="textcenter pagebar" colspan="11">{pigcms{$page}</td></tr>							<else/>								<tr><td class="textcenter red" colspan="11">列表为空！</td></tr>							</if>						</tbody>					</table>				</div>			</form>		</div><include file="Public:footer"/>