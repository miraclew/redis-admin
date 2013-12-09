<form class="form-horizontal" method="post">
	<fieldset>
		<legend>新增Redis配置</legend>
		<div class="control-group">
			<label class="control-label" for="input01">名称</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="m[name]">
				<p class="help-block"></p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">IP</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="m[host]">
				<p class="help-block"></p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">端口</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="m[port]" value="6379">
				<p class="help-block"></p>
			</div>
		</div>
		
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">保存</button>
			<a class="btn pjax" href="connections.php">取消</a>
		</div>
	</fieldset>
</form>