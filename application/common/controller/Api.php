<?php
namespace app\common\controller;

class Api extends Base
{
    public function initialize()
    {
        parent::initialize();
        /*允许跨域*/
        // $origin = '*';
        // $origin = '192.168.2.183';
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
        header('Access-Control-Allow-Origin:' . $origin);
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authToken");
        if (is_options()) {
            $this->result("1", 402, "option请求", "json");
        }
    }
    //解密
    public function jsDecrypt($encryptedData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
    {
        $encryptedData = base64_decode($encryptedData);
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
        $decrypted = rtrim($decrypted, "\0");
        return $decrypted;
    }
    protected function s_msg($msg = "成功", $data = "")
    {
        if ($msg == null) {
            $msg = "成功";
        }
        $this->result($data, 200, $msg, 'json');
    }
    protected function e_msg($msg = "失败", $code = 405, $data = "")
    {
        if ($msg == null) {
            $msg = "失败";
        }
        $this->result($data, $code, $msg, 'json');
    }
    protected function msg($data)
    {
        if (is_array($data)) {
            $msg = $data['msg'];
            $code = $data['code'];
            $dada = key_exists('data', $data) ?: "";
        }
        $this->result($data, $code, $msg, 'json');
    }
}
