<include file="Public:header"/>	<style type="text/css">		a {			color:blue;		}		a, a:hover {			text-decoration: none;		}		.platform-tag {			display: inline-block;			vertical-align: middle;			padding: 3px 7px 3px 7px;			background-color: #f60;			color: #fff;			font-size: 12px;			line-height: 14px;			border-radius: 2px;		}	</style>	<script type="text/javascript">		$(function() {			//是否启用			$('.status-enable > .cb-enable').click(function(){				if (!$(this).hasClass('selected')) {					var product_id = $(this).data('id');					$.post("<?php echo U('Product/status'); ?>",{'status': 1, 'id': product_id}, function(data){})				}			})			$('.status-disable > .cb-disable').click(function(){				if (!$(this).hasClass('selected')) {					var product_id = $(this).data('id');					if (!$(this).hasClass('selected')) {						$.post("<?php echo U('Product/status'); ?>", {'status': 0, 'id': product_id}, function (data) {})					}				}			})			//是否热门			$('.status-enable-hot > .cb-enable').click(function(){				if (!$(this).hasClass('selected')) {					var product_id = $(this).data('id');					$.post("<?php echo U('Product/ishot'); ?>",{'is_hot': 1, 'id': product_id}, function(data){})				}			})			$('.status-disable-hot > .cb-disable').click(function(){				if (!$(this).hasClass('selected')) {					var product_id = $(this).data('id');					if (!$(this).hasClass('selected')) {						$.post("<?php echo U('Product/ishot'); ?>", {'is_hot': 0, 'id': product_id}, function (data) {})					}				}			})					})	</script>		<div class="mainbox">			<div id="nav" class="mainnav_title">				<ul>					<a href="{pigcms{:U('Product/index')}" class="on">商品列表</a>				</ul>			</div>			<table class="search_table" width="100%">				<tr>					<td>						<form action="{pigcms{:U('Product/index')}" method="get">							<input type="hidden" name="c" value="Product"/>							<input type="hidden" name="a" value="index"/>							筛选: <input type="text" name="keyword" class="input-text" value="{pigcms{$_GET['keyword']}"/>							<select name="type">								<option value="product_id" <if condition="$_GET['type'] eq 'product_id'">selected="selected"</if>>商品编号</option>								<option value="name" <if condition="$_GET['type'] eq 'name'">selected="selected"</if>>商品名称</option>								<option value="store" <if condition="$_GET['type'] eq 'store'">selected="selected"</if>>店铺名称</option>							</select>							&nbsp;&nbsp;分类：							<select name="category">								<option value="0">商品分类</option>								<volist name="categories" id="category">								<option value="{pigcms{$category.cat_id}"><?php if ($category['cat_level'] > 1){ echo str_repeat('&nbsp;&nbsp;', $category['cat_level']); } ?> |-- {pigcms{$category.cat_name}</option>								</volist>							</select>							&nbsp;&nbsp;是否分销：							<select name="isfx">								<option value="0" <if condition="$_GET['isfx'] eq '0'">selected="selected"</if> >全部商品</option>								<option value="1" <if condition="$_GET['isfx'] eq '1'">selected="selected"</if> >分销商品</option>								<option value="2" <if condition="$_GET['isfx'] eq '2'">selected="selected"</if> >非分销商品</option>							</select>																					<!-- &nbsp;&nbsp;分组：							<select name="group">								<option value="0">商品分组</option>								<volist name="groups" id="group">								<option value="{pigcms{$group['group_id']}" <if condition="$Think.get.group eq $group['group_id']">selected</if>>{pigcms{$group['group_name']}</option>								</volist>							</select>							&nbsp;&nbsp;会员折扣：							<select name="allow_discount">								<option value="*">选择</option>								<option value="1" <if condition="$Think.get.allow_discount eq 1">selected</if>>有</option>								<option value="0" <?php if (isset($_GET['allow_discount']) && is_numeric($_GET['allow_discount']) && $_GET['allow_discount'] == 0) { ?>selected<?php } ?>>无</option>							</select>							&nbsp;&nbsp;发票：							<select name="invoice">								<option value="*">选择</option>								<option value="1" <if condition="$Think.get.invoice eq 1">selected</if>>有</option>								<option value="0" <?php if (isset($_GET['invoice']) && is_numeric($_GET['invoice']) && $_GET['invoice'] == 0) { ?>selected<?php } ?>>无</option>							</select>-->							<input type="submit" value="查询" class="button"/>						</form>					</td>				</tr>			</table>			<form name="myform" id="myform" action="" method="post">				<div class="table-list">					<style>					.table-list td{line-height:22px;padding-top:5px;padding-bottom:5px;}					</style>					<table width="100%" cellspacing="0">						<thead>							<tr>								<th>编号</th>								<th class="textcenter">图片</th>								<th>名称</th>								<th>分类</th>								<!--th>分组</th-->								<th>店铺</th>								<th>价格(元)</th>								<!--th>原价(元)</th-->								<th>数量(件)</th>								<th>销量(件)</th>								<!--th>买家限购</th-->								<!--th class="textcenter">是/否参与折扣</th-->								<!--th class="textcenter">是/否有发票</th-->								<th class="textcenter">添加时间</th>								<th class="textcenter" width="100">操作</th>							</tr>						</thead>						<tbody>							<if condition="is_array($products)">								<volist name="products" id="product">									<tr>										<td>{pigcms{$product.product_id}</td>										<td class="textcenter"><img src="{pigcms{$product.image}" width="60" /></td>										<if condition="$product['source_product_id'] gt 0">											<td>												<span style="">{pigcms{$product.name}</span>																								<if condition="$product['source_product_id'] gt 0">													<br/>													<span class="platform-tag" style="display:inline-block;">分销</span>												</if>											</td>										<else/>											<td>												{pigcms{$product.name}											</td>										</if>										<td>{pigcms{$product.category}</td>										<!--td>{pigcms{$product.group}</td-->										<td>{pigcms{$product.store}</td>										<td>{pigcms{$product.price}</td>										<!--td>{pigcms{$product.original_price}</td-->										<td>{pigcms{$product.quantity}</td>										<td>{pigcms{$product.sales}</td>										<!--td>{pigcms{$product.buyer_quota}</td-->										<!--td class="textcenter"><if condition="$product['allow_discount'] eq 1">是<else/>否</if></td-->										<!--td class="textcenter"><if condition="$product['invoic'] eq 1">有<else/>无</if></td-->										<td class="textcenter">{pigcms{$product.date_added|date='Y-m-d H:i:s', ###}</td>										<td>											<span class="cb-enable status-enable"><label class="cb-enable <if condition="$product['status'] eq 1">selected</if>" data-id="<?php echo $product['product_id']; ?>"><span>启用</span><input type="radio" name="status" value="1" <if condition="$product['product_id'] eq 1">checked="checked"</if> /></label></span>											<span class="cb-disable status-disable"><label class="cb-disable <if condition="$product['status'] eq 0">selected</if>" data-id="<?php echo $product['product_id']; ?>"><span>禁用</span><input type="radio" name="status" value="0" <if condition="$product['product_id'] eq 0">checked="checked"</if>/></label></span>										</td>									</tr>								</volist>								<tr><td class="textcenter pagebar" colspan="10">{pigcms{$page}</td></tr>							<else/>								<tr><td class="textcenter red" colspan="10">列表为空！</td></tr>							</if>						</tbody>					</table>				</div>			</form>		</div><include file="Public:footer"/>