<?php
/**
 * 数据库DB类
 * 初始化Mysql类
 * @author JREAM.LU 2014.5.26
 *
 */
class Db_Base {
	public function __construct() {
		$this->_config = Yaf\Application::app ()->getConfig ();
		$this->_db = new Db_Mysql ( $this->_config->database->toArray () );
	}
}