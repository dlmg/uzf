<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class PayWechat extends Model {
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    //详情
    public function detail($where, $field = "*") {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function chaxun($map, $order, $size, $field = "*") {
        $list = $this
        ->alias('a')
        ->join('user b' , 'b.id = a.us_id' , 'LEFT')
        ->where($map)
        ->order($order)
        ->field($field)
        ->paginate($size,false,$config = ['query'=>request()->param()]);
        return $list;
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($uid, $jine, $type, $or_id) {

        $array = array(
            'us_id' => $uid,
            'money' => $jine,
            'type' => $type,
            'or_id' => $or_id,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insertGetId($array);
        return $rel;
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function xiugai($data, $where) {
        return $this->save($data, $where);
    }
    //用户账号
    public function getUsTextAttr($value, $data) {
        if ($data['us_id'] == "") {
            return '';
        }
        $name = model('User')->where('id', $data['us_id'])->value('us_account');
        return $name;
    }
    //提现姓名
    public function getUsNameAttr($value, $data) {
        if ($data['us_id'] == "") {
            return '';
        }
        $name = model('User')->where('id', $data['us_id'])->value('us_real_name');
        return $name;
    }
    //支付类型
    public function getPaWeTypeTextAttr($value, $data) {
        if ($data['pa_we_type'] == 0) {
            return '微信充值';
        }
        $number = Order::where('or_number', $data['pa_we_type'])->value('or_number');
        return $number;
    }
    public function getStatusTextAttr($value, $data) {
        $array = [
            0 => '支付取消',
            1 => '支付成功',
        ];
        return $array[$data['status']];
    }
    public function getTypeTextAttr($value, $data) {
        $array = [
            1 => '支付宝',
            2 => '微信网页',
            3 => '微信内部',
        ];
        return $array[$data['type']];
    }

    /**
     * 异步成功 修改状态
     * @param  [type] $number [description]
     * @return [type]         [description]
     */
    public function back_success($number) {
        $info = $this->where('pa_we_number', $number)->find();
        if (!$info) {
            return;
        }
        //毫无意义的判断
        // if ($info['pa_we_status'] == 1 || $info['pa_we_status'] == 2) {
        //  return;
        // }
        $aa = $this->where('id', $info['id'])->setfield('pa_we_status', 1);

        if ($info['pa_we_type'] != 0) {
            model('Order')->zhifu($info['pa_we_type']);
        } else {
            $benzun = model('User')->get($info['us_id']);
            model('Wallet')->tianjia($benzun['id'], $info['pa_we_num'], 5);
            if ($benzun['us_pid'] == 0) {
                return;
            }
            $parent = model('User')->get($benzun['us_pid']);
            if (!$parent) {
                return;
            }
            $note1 = '直推账户' . $benzun['us_account'] . '充值购物币获得直推奖';
            $direct = $info['pa_we_num'] * cache('setting')['direct_profit'] / 100;
            model('Wallet')->tianjia($parent['id'], $direct, 6, $note1);
            if ($parent['us_pid'] == 0) {
                return;
            }
            $grand = model("User")->get($parent['us_pid']);
            if ($grand) {
                $note2 = '团队账户' . $benzun['us_account'] . '充值购物币获得团队奖';
                $erdai = $info['pa_we_num'] * cache('setting')['erdai_profit'] / 100;
                model('Wallet')->tianjia($grand['id'], $erdai, 7, $note2);
            }

        }
    }
}
