<?php
/**
 * 
 * 单一调调接口封装
 * @author luj 2014.9.22
 * 
 */
class CurlModel {
    
    /**
     * 封装调接口
     * @param string $url
     * @param array $post_data
     * @param array $header_data
     */
    public function CurlPost($url = '', $post_data = array(), $header_data = array()) {
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 ); //禁止直接显示获取的内容 重要
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header_data );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query ( $post_data ) );
        $json = curl_exec ( $ch ); //获取
        curl_close ( $ch );
        
        $api_error = new stdClass ();
        $api_error->status = '-1000';
        $api_error->errorMsg = Lang::goLang ( 'API_ERROR' );
        
        return json_decode ( $json ) == NULL ? $api_error : json_decode ( $json );
    }
}