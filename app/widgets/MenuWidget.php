<?php
class MenuWidget extends _BaseController {
    
    /**
     * 导航菜单部件
     */
    public static function showMenu() {
        //menu列表接口
        $url = API_URL . API_URL_CONTROLLER . 'get_navigation';
        $post_data ['status'] = '';
        $curl = new CurlModel ();
        $result = $curl->CurlPost ( $url, $post_data );
        $result_array = get_object_vars ( $result ); ////Object转array
        $navigations = $result_array ['navigations']; //获取导航菜单
        
        $config = parent::$_widget_config;
        $url_suffix = $config['application'] ['url_suffix'];
        
        parent::$widgetView->widgetAssign ( 'navigations', $navigations );
        parent::$widgetView->widgetAssign ( 'url_suffix', $url_suffix );
        parent::$widgetView->widgetAssign ( 'controller', parent::$controller );
        parent::$widgetView->widgetDisplay ( 'MenuWidget' );
    }

}
