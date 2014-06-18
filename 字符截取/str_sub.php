<?php

/**
* 字符串截取，中文字符按2个字符计算，同时支持GBK和UTF-8编码
* @param  $string     要截取的字符串
* @param  $length     要截取的字符数
* @param  $append     添加到子串后的尾巴
* @return 返回截取后的字符串
*/
function substring($string, $length, $append = false) {
  if ( $length <= 0 ) {
    return '';
  }
  
  // 检测原始字符串是否为UTF-8编码
  $is_utf8 = false;
  $str1 = @iconv("UTF-8", "GBK", $string);
  $str2 = @iconv("GBK", "UTF-8", $str1);
  if ( $string == $str2 ) {
    $is_utf8 = true;
    
    // 如果是UTF-8编码，则使用GBK编码的
    $string = $str1;
  }
  
  $newstr = '';
  for ($i = 0; $i < $length; $i ++) {
    $newstr .= ord ($string[$i]) > 127 ? $string[$i] . $string[++$i] : $string[$i];
  }
  
  if ( $is_utf8 ) {
    $newstr = @iconv("GBK", "UTF-8", $newstr);
  }
  
  if ($append && $newstr != $string) {
        $newstr .= $append;
    }
    
    return $newstr;
}

?>