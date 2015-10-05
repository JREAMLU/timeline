<?php
/**
 * Widget视图类
 * @author JREAM.LU 2014.5.26
 */
class WidgetView {
	
	private $_config;
	
	protected $tVar = array ();
	
	public function __construct() {
		$this->_config = Yaf\Application::app ()->getConfig ();
	}
	
	/**
	 * 模板变量赋值
	 * @access public
	 * @param mixed $name
	 * @param mixed $value
	 */
	public function widgetassign($name, $value = '') {
		if (is_array ( $name )) {
			$this->tVar = array_merge ( $this->tVar, $name );
		}
		else {
			$this->tVar [$name] = $value;
		}
	}
	
	/**
	 * 加载模板和页面输出 可以返回输出内容
	 * @access public
	 * @param string $templateFile 模板文件名
	 */
	public function widgetDisplay($templateFile = '') {
		//获取当前类名
		foreach ( $this->tVar as $key => $value ) {
			$$key = $value;
		}
		require_once $this->_config->application->widgets->view . $templateFile . '.' . $this->_config->application->view->ext;
		return true;
	}

}