
<section id="info">
	<div class="page-header row">
		<div class="span10"><h1>Redis 服务器连接管理 <small>连接配置</small></h1></div>
		<div class="span2"><a class="btn pjax" data-toggle="modal" href="connections.php?a=add">新建配置</a></div>
	</div>

	<table class="table table-bordered" class="span12">
		<thead>
			<tr>
				<th>#</th>
				<th>名称</th>
				<th>IP</th>
				<th>端口</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach ($config['connections'] as $c ) {				
		?>
		<tr>
			<td><?php echo $c['id']?></td>
			<td><?php echo $c['name']?></td>
			<td><?php echo $c['host']?></td>
			<td><?php echo $c['port']?></td>
			<td>
				<a href="javascript:void(0);" class="btn" onclick="connectRedis('<?php echo $c['id']?>','<?php echo $c['host']?>');">连接</a>
				<a href="connections.php?a=delete&id=<?php echo $c['id']?>" class="btn" onclick="return confirm('确定删除吗?');">删除</a>
			</td>
		</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</section>

<section>
	<div class="page-header">
		<h1>Keyspace列表 <small>系统keyspace</small></h1>		
	</div>
	<div class="row">
	    <div class="span12">
		    <textarea rows="10" class="span10" id="keyspace"><?php echo $config['keyspace'] ?></textarea>
			<a href="javascript:void(0);" class="btn" onclick="saveKeyspace()">保存keyspace</a>
	    </div>
	</div>
</section>
