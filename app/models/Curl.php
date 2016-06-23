<?php
/**
 * 
 * 单一调调接口封装
 * @author luj 2014.9.22
 * 
 */
class CurlModel {
    public $err;

    public function init() {
        $this->err = new stdClass();
    }
    /**
     * 封装调接口
     * @param string $url
     * @param array $post_data
     * @param array $header_data
     */
    public function CurlPost($url = '', $post_data = array(), $header_data = array()) {
        if (!is_array($post_data)) {
            $this->err->status = '-1001';
            $this->err->message = '参数不标准';
            return $this->err;
        }

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 ); //禁止直接显示获取的内容 重要
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header_data );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query ( $post_data ) );
        $json = curl_exec ( $ch ); //获取
        curl_close ( $ch );
        
        $this->err->status = '-1000';
        $this->err->errorMsg = '接口调用失败';
        
        return json_decode ( $json ) == NULL ? $this->err : json_decode ( $json );
    }
    
    /*
    仔细分析不难发现经典cURL并发还存在优化的空间, 
    优化的方式时当某个URL请求完毕之后尽可能快的去处理它, 
    边处理边等待其他的URL返回, 
    而不是等待那个最慢的接口返回之后才开始处理等工作, 从而避免CPU的空闲和浪费
    */
    /**
     * $requests['logo']
     * $requests['url']
     * $requests['post_data']
     * $requests['header_data']
     */
    public function RollingCurl ( $requests ) {
        $queue = curl_multi_init ();
        $map = [];
     
        foreach ( $requests as $request ) {
            $ch = curl_init();
     
            curl_setopt ( $ch, CURLOPT_URL, $request['url'] );
            curl_setopt ( $ch, CURLOPT_TIMEOUT, 1 );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, isset($request['header_data']) ? $request['header_data'] : ["Content-Type: application/json; charset=utf-8"] );
            curl_setopt ( $ch, CURLOPT_HEADER, 0 );
            curl_setopt ( $ch, CURLOPT_POST, 1 );
            curl_setopt ( $ch, CURLOPT_NOSIGNAL, 1 );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode ( $request['post_data'] ) );
            
            curl_multi_add_handle ( $queue, $ch ) ;
            $map[(string) $ch] = $request['logo'];
        }
     
        $responses = [];
        do {
            while ( ( $code = curl_multi_exec ( $queue, $active ) ) == CURLM_CALL_MULTI_PERFORM ) ;
     
            if ( $code != CURLM_OK ) { break; }
     
            // a request was just completed -- find out which one
            while ( $done = curl_multi_info_read ( $queue ) ) {
     
                // get the info and content returned on the request
                $info = curl_getinfo ( $done['handle'] );
                $error = curl_error ( $done['handle'] );
                $results = $this->callback ( curl_multi_getcontent ( $done['handle'] ) );
                $responses[$map[( string ) $done['handle']]] = compact ( 'info', 'error', 'results' );
     
                // remove the curl handle that just completed
                curl_multi_remove_handle ( $queue, $done['handle'] );
                curl_close ( $done['handle'] );
            }
     
            // Block for data in / output; error handling is done by curl_multi_exec
            if ( $active > 0 ) {
                curl_multi_select ( $queue, 0.5 );
            }
     
        } while ( $active );
     
        curl_multi_close ( $queue );
        return $responses;
    }

    public function callback ( $data ) {
        preg_match_all ( '/<h3>(.+)<\/h3>/iU', $data, $matches );
        return compact ( 'data', 'matches' );
    }
    
    public function generateMKII($request_data = [], $request_time = "", $secret_key = "") {
		ksort($request_data);
		echo $this->serialize($request_data).'<br>';
		return strtoupper(md5(sha1($this->serialize($request_data) . $secret_key . $request_time)));
	}

	public function serialize($data) {
		if (is_array($data)) {
			$str = "";
			foreach ($data as $key => $value) {
				$str = sprintf('%s%s%s', $str, $key, $this->serialize($value));
			}
			return $str;
		} else {
			return $data;
		}
	}
    
    $meta = [
    'source' => 'cgi',
    'version' => 'v1.0',
    'secret_key' => 'ABC',
    'request_id' => 'A123',
];

$requests = [
    [
        'logo' => 'a',
        'url' => 'http://localhost/study/curl/servera.php',
        'header_data' => [
            'Content-Type: application/json; charset=utf-8',
            "source:{$meta['source']}",
            "version:{$meta['version']}",
            "secret-key:{$meta['secret_key']}",
            "request-id:{$meta['request_id']}"
        ],
        'post_data' => [
            'name' => 'kobe',
            'age' => 11,
            'height' => '198cm',
            'weight' => '105kg'
        ]
    ],
    [
        'logo' => 'b',
        'url' => 'http://localhost/study/curl/serverb.php',
        'post_data' => [
            'name' => 'curry',
            'age' => 13,
            'height' => '190cm',
            'weight' => '95kg'
        ]
    ]
];
$client = new client();
$result = $client->RollingCurl($requests);
var_dump($result);

$servera = $result['a']['results']['data'];
$serverb = $result['b']['results']['data'];

var_dump( json_decode( $servera ) );
var_dump( json_decode( $serverb ) );

var_dump($_SERVER);
}
