<?php
/**
 * 伪静态
 * 切割后缀，正常解析
 * @author JREAM.LU 2014.6.25
 *
 */
class SystemPlugin extends \Yaf\Plugin_Abstract {
	public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
		if (Yaf\Registry::get ( 'config' )->application->url_suffix) {
			if (strtolower ( substr ( $_SERVER ['REQUEST_URI'], - strlen ( Yaf\Registry::get ( 'config' )->application->url_suffix ) ) ) == strtolower ( Yaf\Registry::get ( 'config' )->application->url_suffix )) {
				$request->setRequestUri ( substr ( $_SERVER ['REQUEST_URI'], 0, - strlen ( Yaf\Registry::get ( 'config' )->application->url_suffix ) ) );
			}
		}
	}
}