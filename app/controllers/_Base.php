<?php
/**
 * Controller的父类 继承Yaf_Controller_Abstract
 * @author JREAM.LU 2014.5.26
 */
class _BaseController extends \Yaf\Controller_Abstract {
    
    protected $layout = 'main_layout';
    
    protected static $widgetView;
    
    protected $_session;
    
    protected $_config;
    
    protected static $_widget_config;
    
    protected $_view;
    
    protected $_entity;
    
    protected $breadcrumb = array ();
    
    protected static $module;
    
    protected static $controller;
    
    protected static $action;
    
    public function init() {
        // Set the layout. 判断是否ajax请求
        /*
         * 原生js 发送ajax请求时加上header
         *  var xmlhttp=new XMLHttpRequest(); 
            xmlhttp.open("GET","test.php",true); 
            xmlhttp.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
            xmlhttp.send();
         */
        if (isset ( $_SERVER ["HTTP_X_REQUESTED_WITH"] ) && strtolower ( $_SERVER ["HTTP_X_REQUESTED_WITH"] ) == "xmlhttprequest") {
            // ajax 请求的处理方式 
        }
        else {
            // 正常请求的处理方式 
            $this->getView ()->setLayout ( $this->layout );
        }
        
        //Set session.
        $this->session = Yaf\Session::getInstance ();
        
        // Assign session to views too.
        $this->getView ()->session = $this->session;
        
        // Assign application config file to this controller
        $this->_config = Yaf\Application::app ()->getConfig ();
        self::$_widget_config = Yaf\Application::app ()->getConfig ();
        
        // Assign config file to views
        $this->getView ()->config = $this->_config;
        
        $this->getView ()->module = $this->getRequest ()->getModuleName ();
        $this->getView ()->controller = $this->getRequest ()->getControllerName ();
        $this->getView ()->action = $this->getRequest ()->getActionName ();
        
        self::$module = $this->getRequest ()->getModuleName ();
        self::$controller = $this->getRequest ()->getControllerName ();
        self::$action = $this->getRequest ()->getActionName ();
        
        //title
        $this->getView ()->title = $this->_config ['application'] ['title'] . ' - ' . $this->getRequest ()->getControllerName ();
        
        //伪静态后缀
        $this->getView ()->url_suffix = $this->_config ['application'] ['url_suffix'];
        
        self::$widgetView = Yaf\Registry::get ( "widgetView" );
        
        // Set the template_url 设置模版
        //如果默认的module为nomodule 即无module状态,设置theme url 
        if (strtolower ( $this->getRequest ()->getModuleName () ) == $this->_config->application->dispatcher->defaultModule) {
            $this->getView ()->setScriptPath ( $this->_config->application->view->path );
        }
    }
    
}