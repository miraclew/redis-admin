<header class="jumbotron subhead" id="overview">
  <h1><?php echo $h1 ?></h1>
  <p class="lead">Dozens of reusable components are built into Bootstrap to provide navigation, alerts, popovers, and much more.</p>
  <div class="subnav subnav-fixed">
    <ul class="nav nav-pills">
      <li class=""><a href="#info">基本信息</a></li>
      <li class=""><a href="#search">查询</a></li>
      <li class=""><a href="#watch">KEY监控</a></li>
      <li class=""><a href="#clients">客户端连接</a></li>
    </ul>
  </div>
</header>

<section id="info">
	<div class="page-header">
		<h1>基本信息 <small>info</small></h1>
	</div>
	
<?php 
echo $info;
?>
</section>

<section id="search">
	<div class="page-header">
		<h1>查询 <small>key search</small></h1>
	</div>
	<form class="well form-search">
  		<input type="text" class="input-xxlarge search-query">
  		<button type="submit" class="btn">Search</button>
	</form>
	<table class="table table-bordered">
		<tr>
			<td>KEY</td>
			<td></td>
		</tr>
		<?php
		foreach ($keys as $k) {
		?>
		<tr>
			<td><?php echo $k; ?></td>
			<td width="80px"><a class="btn" onclick="">获取</a></td>
		</tr>
		<tr>
			<td colspan="2"></td>
		</tr>
		<?php
		}	 
		?>
	</table>
	<ul>		
	</ul>
</section>

<section id="watch">
	<div class="page-header">
		<h1>KEY监控 <small>watch</small></h1>
	</div>
<?php 
echo $info;
?>
</section>

<section id="clients">
	<div class="page-header">
		<h1>客户端连接<small>client list</small></h1>
	</div>
</section>
