<?php

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 * @author JREAM.LU 2014.5.26
 */
class Bootstrap extends \Yaf\Bootstrap_Abstract {
    
    private $_config;
    
    /**
     * 初始化配置文件
     **/
    public function _initConfig() {
        $this->_config = Yaf\Application::app ()->getConfig (); //把配置保存起来
        Yaf\Registry::set ( 'config', $this->_config );
        $charset = $this->_config->application->common->charset;
        header ( "Content-Type: text/html; charset=$charset" );
    }
    
    /**
     * 报错设置
     */
    public function _initErrors() {
        if ($this->_config->application->showErrors) {
            ini_set ( "display_errors", "On" );
            error_reporting ( E_ALL );
        }
        else {
            ini_set ( "display_errors", "Off" );
            error_reporting ( 0 );
        }
    }
    
    public function _initNamespaces() {
        Yaf\Loader::getInstance ()->registerLocalNameSpace ( array (
            "LUj" 
        ) );
    }
    
    //初始化视图 如果有要添加自己的视图工具  关闭其自动渲染
    /*
	public function _initView(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin
		Yaf_Dispatcher::getInstance ()->disableView (); //关闭其自动渲染
	}
	*/
    
    public function _initView(Yaf\Dispatcher $dispatcher) {
        //	    var_dump($this->_config);
    //	    echo $this->_config->application->view->path;
    //	    die;
    //		Yaf_Dispatcher::getInstance ()->initView($this->_config->application->view->path);
    }
    
    public function _initRoute(Yaf\Dispatcher $dispatcher) {
        $router = Yaf\Dispatcher::getInstance ()->getRouter ();
        
        $route = new Yaf\Route\Rewrite ( 'd/:domain', array (
            'controller' => 'merchant', 
            'action' => 'domainHome' 
        ) );
        
        $router->addRoute('merchant', $route);
    }
    
    /**
     * 设置页面layout
     */
    public function _initLayout(Yaf\Dispatcher $dispatcher) {
        if (! $dispatcher->getRequest ()->isXmlHttpRequest ()) {
            $layout = new Layout ( $this->_config->application->layoutpath );
            $dispatcher->setView ( $layout );
        }
    }
    
    /**
     * 加载i18n
     */
    public function _initLanguage(Yaf\Dispatcher $dispatcher) {
        $lang = new Lang ();
    }
    
    /**
     * 加载公共方法
     */
    public function _initCommon(Yaf\Dispatcher $dispatcher) {
        $Common = new Common ();
        Yaf\Registry::set ( 'common', $Common );
    }
    
    /**
     * 加载widget
     */
    public function _initWidget(Yaf\Dispatcher $dispatcher) {
        //初始化widget view 视图类 library
        $widgetView = new WidgetView ();
        Yaf\Registry::set ( 'widgetView', $widgetView );
        
        //初始化widget插件, 加载widget
        $widgetPlugin = new WidgetPlugin ();
        $dispatcher->registerPlugin ( $widgetPlugin );
    }
    
    public function _initPluginUser(Yaf\Dispatcher $dispatcher) {
        $system = new SystemPlugin ();
        $dispatcher->registerPlugin ( $system );
    }

}