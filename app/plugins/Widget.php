<?php
/**
 * widget插件类
 * 加载需要的widget类
 * @author Jream.lu 2014.5.26
 */
class WidgetPlugin extends \Yaf\Plugin_Abstract {
    
    private $_config;
    
    public function __construct() {
        $this->_config = Yaf\Application::app ()->getConfig ();
    }
	
    /**
     * 分发之前触发
     * 在这里加载新到widget 
     * @param unknown_type $request
     * @param unknown_type $response
     */
	public function preDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
		$this->loadWidget('MenuWidget');
	}
	
	/**
	 * 加载widgets类
	 */
	public function loadWidget($name = '') {
		if (isset ( $name ) && $name != '') {
			include $this->_config->application->widgets->path . $name . '.' . $this->_config->application->view->ext;
		}
	}

}