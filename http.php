<?php

/**
 * 获取HTTP相应状态码所对应的描述文本
 * @param int $code
 * @return string
 */
function get_status_header_desc($code){
    global $status_header_desc; 
    if ( !isset($status_header_desc) ){
        $status_header_desc = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',
            226 => 'IM Used',
            
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => 'Reserved',
            307 => 'Temporary Redirect',
            
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            426 => 'Upgrade Required',
            
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            510 => 'Not Extended'
        );
    }
    if (isset($status_header_desc[$code])){
        return $status_header_desc[$code];
    } else {
        return '';
    }           
}

/**
 * 输出指定HTTP状态码的响应头信息
 * @param int $code
 * @return void
 */
function status_header($code){
    $desc = get_status_header_desc($code);
    if ( empty($desc) ){
        return false;           
    }
    $protocol = $_SERVER['SERVER_PROTOCOL'];
    if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
        $protocol = 'HTTP/1.0';
    $status_header = "$protocol $code $desc"; 
    header($status_header);
}

/* *** 调用举例 *** */

//OK
status_header(200);

//Moved Permanently
status_header(301);

//Not Found
status_header(404);

//Internal Server Error
status_header(500);

?>