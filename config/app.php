<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

return [
    // 应用名称
    'app_name' => '',
    // 应用地址
    'app_host' => '',
    // 应用调试模式
    'app_debug' => true,
    // 应用Trace
    'app_trace' => true,
    // 是否支持多模块
    'app_multi_module' => true,
    // 入口自动绑定模块
    'auto_bind_module' => false,
    // 注册的根命名空间
    'root_namespace' => [],
    // 默认输出类型
    'default_return_type' => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return' => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler' => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler' => 'callback',
    // 默认时区
    'default_timezone' => 'Asia/Shanghai',
    // 是否开启多语言
    'lang_switch_on' => false,
    // 默认全局过滤方法 用逗号分隔多个
    //'default_filter' => 'trim,htmlspecialchars',
    'default_filter' => 'trim',
    // 默认语言
    'default_lang' => 'zh-cn',
    // 应用类库后缀
    'class_suffix' => false,
    // 控制器类后缀
    'controller_suffix' => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module' => 'index',
    // 禁止访问模块
    'deny_module_list' => ['common'],
    // 默认控制器名
    'default_controller' => 'index',
    // 默认操作名
    'default_action' => 'index',
    // 默认验证器
    'default_validate' => '',
    // 默认的空模块名
    'empty_module' => '',
    // 默认的空控制器名
    'empty_controller' => 'Error',
    // 操作方法前缀
    'use_action_prefix' => false,
    // 操作方法后缀
    'action_suffix' => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo' => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch' => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr' => '/',
    // HTTPS代理标识
    'https_agent_name' => '',
    // URL伪静态后缀
    'url_html_suffix' => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param' => true,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type' => 0,
    // 是否开启路由延迟解析
    'url_lazy_route' => false,

    'url_route_on'  =>  false,
    // 是否强制使用路由
    'url_route_must' => false,
    // 合并路由规则
    'route_rule_merge' => false,
    // 路由是否完全匹配
    'route_complete_match' => false,
    // 使用注解路由
    'route_annotation' => false,
    // 域名根，如thinkphp.cn
    'url_domain_root' => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert' => true,
    // 默认的访问控制器层
    'url_controller_layer' => 'controller',
    // 表单请求类型伪装变量
    'var_method' => '_method',
    // 表单ajax伪装变量
    'var_ajax' => '_ajax',
    // 表单pjax伪装变量
    'var_pjax' => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache' => false,
    // 请求缓存有效期
    'request_cache_expire' => null,
    // 全局请求缓存排除规则
    'request_cache_except' => [],

    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl' => Env::get('think_path') . 'tpl/dispatch_jump.tpl',
    'dispatch_error_tmpl' => Env::get('think_path') . 'tpl/dispatch_jump.tpl',

    // 异常页面的模板文件
    'exception_tmpl' => Env::get('think_path') . 'tpl/think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message' => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg' => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    // 'exception_handle' => function (Exception $e, $data = []) {
    //     $data = [
    //         'code' => -1,
    //         'msg' => $e->getMessage() . ' in ' . $e->getFile() . '#' . $e->getLine(),
    //     ];
    //     return response($data, '500', [], 'json');
    // },
    'sms' => [
        'status' => 1,
        'userid' => '',
        'account' => '13821305839',
        'password' => '13821305839!$',
        'mobile' => '',
        'content' => '【优座APP】尊敬的会员您好,您的验证码为：',
        'contentlast' => '。验证码有效时间两分钟，请尽快使用。如非本人操作，请忽略！',
    ],
    'wechat_numb' => [
        'token' => 'FeAhvDhNJzDYEyNH0eeAhjhvah07EYJH',
        'encodingaeskey' => 'Z48Rr94RuX8JO4e9FXRuxrRr9Fo9R96wfzRofoFJ6fw',
        'appid' => 'wx3d7755dcd2bf370e',
        'appsecret' => 'eaa8d3e1dc235294d3863ba313097a5e',
    ],
    'wechat' => [
        'appid' => 'wx79716d981d020d8e', // APP APPID
        'app_id' => 'wx79716d981d020d8e', // 公众号 APPID
        'miniapp_id' => 'wx79716d981d020d8e', // 小程序 APPID
        'mch_id' => '1535191001',
        'key' => 'aswede2514sd748ddf547sfsfs854621',
        'return_url' => 'http://www.swys.ltd',
        'notify_url' => 'http://admin.swys.ltd/index/alipay/cz_notify',
        'cert_client' => './cert/apiclient_cert.pem', // optional, 退款，红包等情况时需要用到
        'cert_key' => './cert/apiclient_key.pem',// optional, 退款，红包等情况时需要用到
        'log' => [ // optional
            'file' => './logs/wechat.log',
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
        ]
    ],
    'alipay' => [
        'app_id' => '2019051464468477',//草津堂
        //'app_id' => '2016093000634037',//沙箱
//        'return_url' => 'http://47.92.88.214:8679/#/jy_ok',http://47.92.145.141:8057/#/index/
        'return_url' => 'http://www.swys.ltd',
        'notify_url'=>'http://admin.swys.ltd/index/Alipay/notify',
        //'notify_url'=>'http://smw.jugekeji.com/index/Alipay/cz_notify',
        //支付宝公钥
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhpkCOSLpxYf5muM0jRUX8YWlT7146vnmX8trEcVoGRLj1VJSLchMRtoqAEwH5Aq1XRYe2+Fnvbdnm4TFYI1H0ozBMo9BG922kh9lUcG+l5Hmvk2XwldW8t3NZUE67NZ3oxD9WPoyxmwHZ4QkznBHZBsTb4EbAVoIuIYPQVeQgQeHKVujXLVxkoh4G2h1Ar1fycy7Dq5Imw0nXVShioACVRxoDwwMDa2iUOFhG30w9wrBB8EmRBiLbkwEhRTH1RDy2p2u7VzMvV++PP6rW8u8jH3YTGHrdeVmzS4J2fxmsEioCTsYQTD9cYnmWD4TWjjN1TknY2qZAEwBHlXwBCK3NwIDAQAB',//草津堂
        //'ali_public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB',//沙箱
        // 加密方式： **RSA2**
        //商户应用私钥
         'private_key' => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCNngyExXQP42jw7fttwnh2Vy26NGKGRS5UNX4lhxJw5R89JId624JWI00ANWKud0gu1aT56btJIQEzrYAmWOAPB01yfqFxkw+G31dNQv9mTk9nMa46Wv6vTlCunyJmr/WYmQg8op8zhIbLTg/14HtRBwaFuO6FTpiKfd7Sw00O/7mURCTFgT7HSrQtRZod+S2qGfDWeTrGxCTZy8kjaiiKoH4hODVbnUoBYFBtAkpPJBNzVny0BK1ekCTr/dxwU8+wgz9EtneEGDBMOJSQfcguGXCqNwTDeyZbz1O6BQC1/hX1CgozhR9JfLVlB6rooS+dFYk+KkGtkmgQOoCN+gUtAgMBAAECggEACiUzcmOO4ACDqRbzdzaCWMAAF6HfGQ1lt0Spx9h4WrwfU8sFJakKGk+nGYe5jRQgiLJngjvbXe7OXjxkvNqLGqiERNqLiE5nw1rGr1NIZrTffV4SxD12l2p93zSpSz/50TfNXkKsMw2gdnoeLJgrXW+qaPQJqmUqCmngB6tUHunZviRuhI1GY7EadgsyNNQanvFQrcGXPeoh58aNI4hfAP6KdAgJ08iuPb3TnFUYL0BceEz9dzbBS0SX2pUVUXjgGQttIOCV/9hYBTyNEJA7m61M52qPCoP2+V3zeceqOn41zDyL+MbgP5W7VkdTqQcZu6TnTx7Ox6di+R8NXZ3UhQKBgQDFXkc0FqU016Ip4WIY52fFMH81ZKQ7RNMZ5qnETCU+wRDi7tziGVITdvmfAqZWpdjNeDEnG+fdM9W3/c2guRWqahFBMkb1/RdRJDmG+K/5IXljksshX9sv//ONLs5YvWi8Y1KhhR4+1BkAA9Lchq/FsjjqmkVREi7cxzL2k3vmTwKBgQC3r/QSKbfWMVXezcndJI62OgfOFrRIU67boEho8jtXh0g1CcM0hBQ/13FcZo71xNq/KAzdaFXtxfhcSldHhIXe8N2CLBQSixL7UIhVV9Qf3KWwr2o6PsPQVgc9zpme20dqjpb0XAVv8jNnFGW4K8/IwJHCBr5lNo+fGuYkeA45wwKBgQCf7bpC0grCm+yyhQhJZ9GlbpvVtxyBTk7E0S1Fe/I+PJGjYayopZ3lWeYB3FLPKYpZTIh/yVQD4YnPkqC6GOAee95JdyUbFR98x5656PAnLuG/NubUv2jMJ1nCUGgybiDdbpo5ebW9cX5kjbSir5zk1HrcV2/Ntq80hVGdjnq6bwKBgHGb3CNXtiI+RVQWh6HFOJcwcR9gH4UUbPPdwKtYFqfePiS/swJKJpQN1klGDWmopXrRdJOEMpFrfl7mg/Dx4DKxWu9l/8wwRD834fqW5dYHDFupQtRfeZDjhHsPyyfbi+I16tucBqjkbjJ1BSzRvCP4Jq6QqTXEdzP62Rj5QCMtAoGAbXuFq/LcRKP6SzHlCjluUwAbaoZYUESdS1O9Ey2JpZG2Z6Vphd3C9aVgZ+bQT80ddrATgEjJtjxhea4WuphQHfygtIGHFmxNIzSGeLT0X0kIiuYvxu1sOa+BqjFQoyx1O7aBeU+iTZPWU6DOH5zP241ASc2NnMVPWUhKAG9hBg4=',//草津堂
        //'private_key' => 'MIIEwAIBADANBgkqhkiG9w0BAQEFAASCBKowggSmAgEAAoIBAQCOY6X13cjmwrw1S/fDXpNXbOs4WCLYHSbLtoQlo7h/QQZq2HZUjVZ/eyB2kh6zmOMq6YKYIffnT3/CWedgNfPJyNprVuMbVpspxNugRwymY3INPyZNJcD4vj7kaXFR/8NGk4YiDIMbbYOwMHDAEV0H37DPp30xtq4cNJSML4Fipr/rKAePklYgfmUKYA7dwdcw2hdoMRk7ZIHvfBDlowomftUmwpu2Sh9bEgu3YHpY0+kbVqqq+/2+2vC8J8vQilz9ZlSINKXhnm0RupdZ68CMMnfsCuSfRYuwt1i/DxDCj6zBCgsfs96Yg/2jCMhB0RSkj92JAbcc3dR2/nfYdMgFAgMBAAECggEBAIfi8W9CyYfwME1swnbguxykBZcwBZDZwTyIYnTJWjmXhNhS3Bq1B+eBSeneaQ5cye8aClfFkyBc7kA8LGPVGWNpG4l00ig07r9d73t2Usw3+5BIw/S8Iv1AEiVJu6vVujaQc2HrLvPt/88Va4ThDTeGcua5oPDgtiiUxW9DpubNbpSL1ytI5/Wm+T7M8xTFmQZrNCkzBxpAhilUyjoTmINpaKFnpc8wYmleYpjQyd5rLC9Y0ItopFjqwWWnwXdDFrWeVUseyHyaJe2Z5zBDHTe6XNnfUjiH/woXTzgtGefy9VIO3qqLySM3SVjkUffZ4Yr0MEpomz0s7jkSQ3aOR8ECgYEAz05QZvKmSHNGDvunpAZKFnCN5FEiXRyKpjKiJasp0egHqsuDoVQFZy9ZHTeiX5KoNt7i8HnKVYIzpwqu/poA8uA3qpNMrJfCke36akmrwlKBb2k2Y6yVraUDPTNBZFa2I5POzMbko9kX5FJScIe2pbKa5QsuYkiCbplgm9w4S88CgYEAr9XGnhhex0fpXB/aduKAA4BtfZl75793bONyCY4MKx4KRZ8Xp5OfWdNOyf3cviy1DPZKuyg/71pCMdpuXAzums2GozztqBmU/E+x8fMyHpk10/iH9kYUTEG0672XPi5eGTviTigsV04wQVQxWo8HJBIGBHtdsDrQtYrV3gt8/+sCgYEAsKBLBMutPYFpqY5ksO3i5eeUHXm7S5Xr09rEKFADW6LUFYM8bZIG4HmI9cnXAJMV21pgBP/fkqdSlvoVSzuvnz/GbgD+jPbogik++Jw4SWK+gUwlWRtMlBxJ/DTVfEYc/YcL5ZF4cNmg75nsP5CB3/+i1Y+HP5oD93OaynEBTiUCgYEAnrhj31W0SEK7fXMrauEuGPsW2qdvV1RX4yy0Rbe5eDpXn1zqp1P0Jcs+dcr4NZp5m8e+0Y6Vl+NrmUDJGcJ6p7YacMOQ64qcF92AjRywAzrdggf4AvBjZipxu9KZ8YE9Y53QvCg7Tlu/51iubEZrdb3nPKh3e5q7xwQZ5aONJB0CgYEAhyYaSIY08ds7UKyxFdNYDRR8q8aJv2fG+1IXC6k5ky0p/THBXy7cwW0FtmjiRmQsVu+yD7byp4ycrXjWYXy1D3/e3tr+8WYnfMhlzs+/cFwQ4er8OcB/ufHPV0EflDSMfiaI11GcqBQXYsbBH//1FzkO71NWt4pNd4Kzm99zbro=',//沙箱
    ],

];