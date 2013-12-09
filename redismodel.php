<?php
/**
 * Redis 数据模型基类
 *
 */
class RedisModel {
	const MODE_PIPELINE = Redis::PIPELINE;
	const MODE_MULTI = Redis::MULTI;

	protected $redis;
	
	public function __construct()
	{
		$engine = Cache::getEngineByConfig('counter');
		if ($engine === false)
			throw new Exception("Redis config error");
		 
		$this->redis = $engine->getRedisInstance();
	}
	
	public static function redis() {
		$instance = new self();
		return $instance->redis;
	}

	/*
	 * 构造缓存的key值
	* $keyFormat
	* 可变参数1,2...
	*/
	public function k($keyFormat, $args = null) {
		global $hdConfig;
		//$keyFormat = str_replace(":", "_", $keyFormat);
		 
		if ($args === null) { //无可变参数
			return $keyFormat;
		} elseif (!is_array($args)) {
			$args = array_slice(func_get_args(), 1);
		}
		return vsprintf($keyFormat, $args);
	}

	/**
	 * 开始批量操作
	 * @param int $mode MODE_PIPELINE 为批量操作，MODE_MULTI为事务操作(transaction)
	 */
	public function multi($mode = self::MODE_PIPELINE) {
		$this->redis->multi($mode);
	}

	/**
	 * 执行批量操作
	 */
	public function exec() {
		$this->redis->exec();
	}

	/**
	 * 取消批量操作
	 */
	public function discard() {
		$this->redis->discard();
	}
}
