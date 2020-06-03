<?php
namespace app\common\validate;

use think\Validate;

/**
 * 添加管理员验证器
 */
class Verify extends Validate
{
    protected $rule = [
        // '__token__' => 'token',
        'ad_tel|手机/账号' => 'require|length:11|regex:/^[1][3456789][0-9]{9}$/',
        'ad_name|姓名' => 'require|max:25',
        'ad_pwd|登录密码' => 'require',
        'ro_id|角色' => 'require',

        'ptel|推荐人账号' => 'require|regex:/^[1][3456789][0-9]{9}$/',
        'us_nickname|姓名' => 'require',
        'us_tel|手机号' => 'require|regex:/^[1][3456789][0-9]{9}$/',
        'us_pwd|密码' => 'require',
        //'us_safe_pwd' => 'require',
        'area_name|区域名' => 'require',

        //提现
        'tx_num|提现金额' => 'require|float|gt:0',

        //用户忘记密码
        'us_pwd2|密码' => 'require',
        'code|验证码' => 'require',

        //会员注册
        'take_tel|收货电话' => 'require|regex:/^[1][3456789][0-9]{9}$/',
        'take_name|收货人' => 'require',
        'take_addr|收货地址' => 'require',

        'st_name' => 'require',
        'st_logo' => 'require',
        'st_tel' => 'require|regex:/^[1][3456789][0-9]{9}$/',
        'area_id|所属区域' => 'require',
        'province|省份' => 'require|gt:0',
        'city|城市' => 'require|gt:0',
        'town|区域' => 'require|gt:0',
        'area|区域' => 'require|gt:0',
        'st_addr_detail|详细地址' => 'require',

        'ca_name|分类名称' => 'require',
        'ca_pic|分类图标' => 'require',

        'pd_name|商品名称' => 'require',       
        'pd_price|商品价格' => 'require|float',
        'pd_inventory|商品库存' => 'require|elt:99999',
        'ca_id|商品分类' => 'require',
        'pd_pic|商品主图' => 'require',
        // 'pd_band|商品品牌' => 'require',
         'pd_place|产地' => 'require',
        // 'pd_spec|商品型号' => 'require',

        'addr_code|收货地址' => 'require',
        'addr_detail|详细收货地址' => 'require',
        'addr_tel|收货电话' => 'require',
        'addr_receiver|收货人' => 'require',

        'first|二维码起始编号' => 'require',
        'last|二维码截止编号' => 'require',
        'us_id|代理商' => 'require',
        'ca_id|产品分类' => 'require',

        'ali_account|支付宝账号' => 'require',
        'we_account|微信账号' => 'require',
        'bank_account|银行卡账号' => 'require',

        //申请成为商家
        'us_id_card|身份证号' => 'require',
        'us_name|真实姓名' => 'require',
        'us_apply_addr|所在地区' => 'require',
        'us_apply_tel|联系电话' => 'require',
        'merchant_name|商家名称' => 'require',
        'telephone|联系电话' => 'require|regex:/^[1][3456789][0-9]{9}$/',
        'merchant_style|商家类别' => 'require',

        'card_holder|持卡人'=> 'require',
        'bank_account|银行卡号'=> 'require',
        'bank_name|开户银行'=> 'require',
        'content|留言内容' => 'require',
        'pd_id|服务id' => 'require',

        //修改密码
        'old|原密码' => 'require',
        'new|新密码' => 'require',
        'con|确认密码' => 'require|confirm:new',

        //发起投票
        'name|名称' => 'require',
        'add_time|开始时间' => 'require',
        'end_time|结束时间' => 'require',
        'type|类型' => 'require',
        'need|所需资金' => 'require|number',

        //发布道具
        'category' => 'require',
        'price' => 'require|number',
        'picture' => 'require',
    ];
    protected $field = [
        'ad_account' => '管理员账户',
        'ad_real_name' => '管理员真实姓名',
        'ad_pwd' => '管理员登录密码',
        'ad_tel' => '管理员手机号',
        'ptel' => '父账号手机号',
        'us_tel' => '会员手机号',
        'us_nickname' => '昵称',
        'us_pwd' => '用户登录密码',
        'us_safe_pwd' => '用户安全密码',

        'st_name' => '门店名称',
        'st_logo' => '门店logo',
        'st_tel' => '门店手机号',

        'st_longitude' => '经度',
        'st_latitude' => '纬度',

        'st_id' => '门店ID',
        'ca_name' => '分类名称',

        'pd_name' => '商品名称',
        'pd_pic' => '商品主图',
        'pd_price' => '商品价格',
        'ca_id' => '分类ID',

        'co_name' => '配送员姓名',
        'co_tel' => '配送员手机号',
        'sku_name'=> '规格名称',
        'sku_price'=> '规格价格',
        'card_holder'=> '持卡人',
        'bank_account'=> '银行卡号',
        'bank_name'=> '开户银行',

    ];
    protected $message = [
        'province.gt' => '请选择省份',
        'city.gt' => '请选择城市',
        'town.gt' => '请选择区域',
        'con.confirm' => '两次输入密码不一致',
    ];
    protected $scene = [
        // 前台
        'addAdmin' => ['ad_name', 'ad_tel', 'ad_pwd', 'ro_id',], //添加管理员
        'editAdmin' => ['ad_name', 'ad_tel', ], //修改管理员
        'addUser' => ['us_tel'], //添加用户
        'addTake' => ['take_name', 'take_tel', 'take_addr'], //会员注册
        'addAreastore' => ['us_tel', 'area_name','ad_tel'], //添加区域
        'editUser' => ['us_nickname','us_tel'], //修改用户
        'selfeditUser' => ['us_nickname'], //修改用户
        'forgetUser' => ['us_tel', 'us_pwd'], //忘记密码
        'addStore' => ['us_tel', 'ad_tel', 'st_tel', 'st_name', 'area_id', 'st_logo','province','city','town','st_addr_detail' ], //添加门店
        'editStore' => ['st_name', 'st_logo', 'st_pic', 'st_tel', 'st_label'], //修改门店
        'addCate' => ['ca_name','ca_pic'], //添加分类
        'addProduct' => ['pd_name','pd_pic', 'pd_price', 'ca_id'], //添加产品
        'editPd' => ['pd_name', 'pd_pic', 'pd_price', 'ca_id'], //修改产品
        'addAddr' => ['province', 'city' , 'addr_detail', 'addr_tel', 'addr_receiver'], //添加地址
        'tixian' => ['tx_num'],//提现
        'addBank' =>['bank_account','bank_name','card_holder'], //银行卡
        'deliver' => ['or_express','or_express_num'],//发货
        'bind' => ['first','last','ca_id'],//绑定二维码
        'editPwd' => ['old','new','con'],//修改密码
        'register' => ['us_nickname', 'us_tel', 'us_pwd'], //用户注册
        'apply' => ['merchant_name','telephone','merchant_style' ],//申请成为商家
        'addSku'=>['sku_name','sku_price'],//添加商品规格
        'addmessage'=>['ad_tel','ad_name','content'],//客户留言
        'addBid'=>['pd_id'],//竞价B
        'vote' => ['name','add_time','end_time','type','need'],//发布投票
        'addTools' => ['name','category','picture','price'],//添加道具
    ];

}
