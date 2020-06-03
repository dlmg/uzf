<?php
function is_options()
{
    return request()->isOptions();
}
function is_post()
{
    return request()->isPost();
}
function is_get()
{
    return request()->isGet();
}
// ------------------------------------------------------------------------
/**
 * 加密函数
 * @param string 加密后字符串
 */
function encrypt($data, $key = 'fes45dsk')
{
    $prep_code = serialize($data);
    $block = mcrypt_get_block_size('des', 'ecb');
    $pad = $block - (strlen($prep_code) % $block);
    if (($pad = $block - (strlen($prep_code) % $block)) < $block) {
        $prep_code .= str_repeat(chr($pad), $pad);
    }
    $encrypt = mcrypt_encrypt(MCRYPT_DES, $key, $prep_code, MCRYPT_MODE_ECB);
    return base64_encode($encrypt);
}
function xmlToArray($xml)
{
    //禁止引用外部xml实体
    libxml_disable_entity_loader(true);
    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    return $values;
}

//微信异步通知获取post数据函数
function post_data()
{
    //$receipt = $_REQUEST;
    $receipt=null;
    if($receipt==null){
        $receipt = file_get_contents("php://input");
        if($receipt == null){
            $receipt = $GLOBALS['HTTP_RAW_POST_DATA'];
        }
    }
    return $receipt;
}
/**
 *  解密函数
 * @param array 解密后数组
 */
function decrypt($str, $key = 'fes45dsk')
{
    $str = base64_decode($str);
    $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
    $block = mcrypt_get_block_size('des', 'ecb');
    $pad = ord($str[($len = strlen($str)) - 1]);
    if ($pad && $pad < $block && preg_match('/' . chr($pad) . '{' . $pad . '}$/', $str)) {
        $str = substr($str, 0, strlen($str) - $pad);
    }
    return unserialize($str);
}

/**
 * hmacMd5
 */
function HmacMd5($data, $key)
{
    //RFC 2104 HMAC implementation for php
    //Creates an md5 HMAC.
    //Eliminates the need to install mhash to compute a HMAC
    //Hacked by Lance Rushing(NOTE:Hacked means written)
    //需要配置环境支持iconv,否则中文参数不能正常处理
    $b = 64;
    if (strlen($key) > $b) {
        $key = pack("H*", md5($key));
    }
    $key = str_pad($key, $b, chr(0x00));
    $ipad = str_pad('', $b, chr(0x36));
    $opad = str_pad('', $b, chr(0x5c));
    $k_ipad = $key ^ $ipad;
    $k_opad = $key ^ $opad;
    return md5($k_opad . pack("H*", md5($k_ipad . $data)));
}

//解密
function jsDecrypt($encryptedData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
{
    $encryptedData = base64_decode($encryptedData);
    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
    $decrypted = rtrim($decrypted, "\0");
    return $decrypted;
}

//加密
function jsEncode($encodeData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
{
    $encode = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encodeData, MCRYPT_MODE_CBC, $iv));
    $encode = rtrim($encode, "\0");
    return $encode;
}

// ------------------------------------------------------------------------
/**
 * 生成一段随机字符串
 * @param int $len 几位数
 */
function GetRandStr($len)
{
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9",
    );
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i = 0; $i < $len; $i++) {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}

//上传图片
function base64_upload($base64)
{
    $base64_image = str_replace(' ', '+', $base64);
    //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)) {
        $image_name = rand(100, 999) . time() . '.png';
        $path = "/uploads/" . date("Ymd") . '/' . $image_name;

        $image_file = env('ROOT_PATH') . 'public/' . $path;
        $rel = check_path(dirname($image_file));
        //服务器文件存储路径
        if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))) {
            return $path;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function upload_img($file)
{
    try {
        $bb = env('ROOT_PATH');
        $info = $file->validate(['size' => '4096000', 'ext' => 'jpg,png,gif,jpeg'])
            ->move($bb . 'public/uploads/');
        if ($info) {
            $path = '/uploads/' . $info->getsavename();
            $path = str_replace("\\", "/", $path);
            return $path;
        } else {
            $data = array(
                'msg' => $file->getError(),
                'code' => 0,
            );
            return json($data);
        }
    } catch (\Exception $e) {
        $this->e_msg($e->getMessage());
    }
}

//创建文件函数
function writelog($filename,$content)
{

    $fileopen = fopen($filename,"a+");

    fwrite($fileopen,$content."\r\n");

    fclose($fileopen);

}

function check_path($path)
{
    if (is_dir($path)) {
        return true;
    }
    if (mkdir($path, 0755, true)) {
        return true;
    }
    return false;
}
//获取分类的字分类
function getChild($id)
{
    $map['p_id'] = $id;
    $list = model('Cate')->getlist($map);
    return $list;
}

function str_replace_limit($search, $replace, $subject, $limit = -1)
{
    if (is_array($search)) {
        foreach ($search as $k => $v) {
            $search[$k] = '`' . preg_quote($search[$k], '`') . '`';
        }
    } else {
        $search = '`' . preg_quote($search, '`') . '`';
    }
    return preg_replace($search, $replace, $subject, $limit);
}

/**
 * $msg 待提示的消息
 * $url 待跳转的链接
 * $icon 这里主要有两个，5和6，代表两种表情（哭和笑）
 * $time 弹出维持时间（单位秒）
 */
function alert($msg='',$url='',$icon='',$time=3){ 
    $str='<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script><script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>';//加载jquery和layer
    $str.='<script>$(function(){layer.msg("'.$msg.'",{icon:'.$icon.',time:'.($time*1000).'});setTimeout(function(){self.location.href="'.$url.'"},2000)});</script>';//主要方法
    return $str;
}
/**
 * $msg 待提示的消息
 * $icon 这里主要有两个，5和6，代表两种表情（哭和笑）
 * $time 弹出维持时间（单位秒）
 */
function alert_error($msg='',$time=3){ 
  $str='<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> <script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>';//加载jquery和layer
  $str.='<script>
    $(function(){
      layer.msg("'.$msg.'",{icon:"6",time:'.($time*1000).'});
      setTimeout(function(){
          window.history.go(-1);
      },2000)
    });
  </script>';//主要方法
  return $str;
}
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//的数据卡的痕迹看撒谎的接口撒谎的



