<?php
use GuzzleHttp\Client;
use GuzzleHttp\Pool;

class Requester {
    public static function concurrent($request_info) {
        $requests = [];
        
        $client = new GuzzleHttp\Client ();
        
        foreach ( $request_info as $v ) {
            $requests [] = $client->createRequest ( $v [0], $v [1], $v [2] );
        }
        
        return Pool::batch ( $client, $requests );
    }
    
    public static function single($url, $options) {
        return (new GuzzleHttp\Client())->post ( $url, $options );
    }
    
    public static function post($url, $options) {
        return (new GuzzleHttp\Client())-> post ( $url, $options );
    }
    
    public static function get($url) {
        return (new GuzzleHttp\Client())-> get ( $url );
    }
}
