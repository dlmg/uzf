<?php
namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

/**
 *财务
 */
class Ucaiwu extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //用户姓名
    public function getUidTextAttr($value, $data)
    {
        return model('User')->where('Id', $data['uid'])->value('real_name');
    }
    //添加
    public function tianjia($uid, $jine, $type)
    {

        $data = array(
            3 => '会员转出',
            4 => '每日派送',
        );
        $array = array(
            'uid' => $uid,
            'jine' => $jine,
            'note' => $data[$type],
            'type' => $type,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insert($array);
        if ($rel) {
            $data = [4];
            if (in_array($type, $data)) {
                db('user')->where('Id', $uid)->setInc('jifen', $jine);
            } else {
                db('user')->where('Id', $uid)->setDec('jifen', $jine);
            }
        }
        return $rel;
    }
    //查询
    public function chaxun($map = [], $order = '', $field = "*")
    {
        return $this->where($map)->order($order)->field($field)->paginate(20);
    }
}
