<?php
namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

/**
 *
 */
class Record extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function getAidTextAttr($value, $data)
    {
        return model('Admin')->where('id', $data['aid'])->value('ad_name');
    }

    public function tianjia($aid, $note)
    {
        $array = array(
            'aid' => $aid,
            'note' => $note,
            'add_time' => date('Y-m-d H:i:s'),
        );
        return $this->insert($array);
    }

    //查询
    public function chaxun($map = [], $order = '', $field = "*")
    {
        return $this->where($map)->order($order)->field($field)->paginate(20);
    }
}
