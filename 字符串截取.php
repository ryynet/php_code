/**
* �ַ�����ȡ�������ַ���2���ַ����㣬ͬʱ֧��GBK��UTF-8����
* @param  $string     Ҫ��ȡ���ַ���
* @param  $length     Ҫ��ȡ���ַ���
* @param  $append     ��ӵ��Ӵ����β��
* @return ���ؽ�ȡ����ַ���
*/

<?php

function substring($string, $length, $append = false) {
  if ( $length <= 0 ) {
    return '';
  }
  
  // ���ԭʼ�ַ����Ƿ�ΪUTF-8����
  $is_utf8 = false;
  $str1 = @iconv("UTF-8", "GBK", $string);
  $str2 = @iconv("GBK", "UTF-8", $str1);
  if ( $string == $str2 ) {
    $is_utf8 = true;
    
    // �����UTF-8���룬��ʹ��GBK�����
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