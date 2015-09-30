<?php
class ErrorController extends _BaseController {
    
    protected $layout = 'main_layout';
    
    /**
     * 常量(启用命名空间后的常量名) 	说明
      	YAF_VERSION(Yaf\VERSION)  Yaf框架的三位版本信息
		YAF_ENVIRON(Yaf\ENVIRON   Yaf的环境常量, 指明了要读取的配置的节, 默认的是product
        YAF_ERR_STARTUP_FAILED(Yaf\ERR\STARTUP_FAILED)  Yaf的错误代码常量, 表示启动失败, 值为512
        YAF_ERR_ROUTE_FAILED(Yaf\ERR\ROUTE_FAILED)  Yaf的错误代码常量, 表示路由失败, 值为513
        YAF_ERR_DISPATCH_FAILED(Yaf\ERR\DISPATCH_FAILED)  Yaf的错误代码常量, 表示分发失败, 值为514
        YAF_ERR_NOTFOUND_MODULE(Yaf\ERR\NOTFOUD\MODULE)   Yaf的错误代码常量, 表示找不到指定的模块, 值为515
        YAF_ERR_NOTFOUND_CONTROLLER(Yaf\ERR\NOTFOUD\CONTROLLER)   Yaf的错误代码常量, 表示找不到指定的Controller, 值为516
        YAF_ERR_NOTFOUND_ACTION(Yaf\ERR\NOTFOUD\ACTION)   Yaf的错误代码常量, 表示找不到指定的Action, 值为517
        YAF_ERR_NOTFOUND_VIEW(Yaf\ERR\NOTFOUD\VIEW)   Yaf的错误代码常量, 表示找不到指定的视图文件, 值为518
        YAF_ERR_CALL_FAILED(Yaf\ERR\CALL_FAILED)  Yaf的错误代码常量, 表示调用失败, 值为519
        YAF_ERR_AUTOLOAD_FAILED(Yaf\ERR\AUTOLOAD_FAILED)  Yaf的错误代码常量, 表示自动加载类失败, 值为520
        YAF_ERR_TYPE_ERROR(Yaf\ERR\TYPE_ERROR)  Yaf的错误代码常量, 表示关键逻辑的参数错误, 值为521
        $this->getRequest ()->getModuleName ();
        $this->getRequest ()->getControllerName ();
        $this->getRequest ()->getActionName ();
        $exception->getCode ();
        $exception->getMessage ();
     * @param object $exception
     */
    public function errorAction($exception) {
        error_reporting(E_ERROR);
        //定义错误信息
        switch ($exception->getCode ()) {
            case YAF_ERR_STARTUP_FAILED :
                $message = Lang::goLang ( 'YAF_ERR_STARTUP_FAILED' ); //512
                break;
            case YAF_ERR_ROUTE_FAILED :
                $message = Lang::goLang ( 'YAF_ERR_ROUTE_FAILED' ); //513
                break;
            case YAF_ERR_DISPATCH_FAILED :
                $message = Lang::goLang ( 'YAF_ERR_DISPATCH_FAILED' ); //514
                break;
            case YAF_ERR_NOTFOUND_MODULE :
                $message = Lang::goLang ( 'YAF_ERR_NOTFOUND_MODULE' ); //515
                break;
            case YAF_ERR_NOTFOUND_CONTROLLER :
                $message = Lang::goLang ( 'YAF_ERR_NOTFOUND_CONTROLLER' ); //516
                break;
            case YAF_ERR_NOTFOUND_ACTION :
                $message = Lang::goLang ( 'YAF_ERR_NOTFOUND_ACTION' ); //517
                break;
            case YAF_ERR_NOTFOUND_VIEW :
                $message = Lang::goLang ( 'YAF_ERR_NOTFOUND_VIEW' ); //518
                break;
            case YAF_ERR_CALL_FAILED :
                $message = Lang::goLang ( 'YAF_ERR_CALL_FAILED' ); //519
                break;
            case YAF_ERR_AUTOLOAD_FAILED :
                $message = Lang::goLang ( 'YAF_ERR_AUTOLOAD_FAILED' ); //520
                break;
            case YAF_ERR_TYPE_ERROR :
                $message = Lang::goLang ( 'YAF_ERR_TYPE_ERROR' ); //521
                break;
            default :
                $message = '1';
                break;
        }
        
        var_dump($message);die;
        $this->getView ()->assign ( "message", '找不到该页面404' );
        $this->getView ()->assign ( "url", BASEURL );
    }
    
}