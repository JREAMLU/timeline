<?php
/**
 * 公共方法
 * @author luj
 *
 */
class Common {
    
    /**
     * 将图片重组分辨率
     * @param string $img_url	必须|http://imgx.xinzuofang.com/xxx.jpg|图片路径
     * @param stringS $resolution 非必须|720|分辨率
     */
    public function dealImg($img_url = '', $resolution = '720') {
        $resolution = '_' . $resolution;
        $suffix = substr ( strrchr ( $img_url, '.' ), 1 );
        
        if (substr ( PHP_VERSION, 0, 3 ) === '5.3') {
            $name = strstr ( $img_url, '.', true );
        }
        else {
            $suffix_count = strlen ( $suffix ) + 1;
            $img_url_count = strlen ( $img_url );
            $name = substr ( $img_url, 0, $img_url_count - $suffix_count );
        }
        
        return $name . $resolution . '.' . $suffix;
    }

}