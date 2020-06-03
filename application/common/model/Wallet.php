<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Wallet extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    /**
     * 插入一条记录
     * @param $data
     * @return int|string
     * @author sunpf
     * @date 2020/4/17 13:41
     */
    public function addInfo($data) {
        $data['add_time'] = date("Y-m-d H:i:s");
        return  $this->insertGetId($data);
    }
    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function getList($map, $order, $size, $field = "*")
    {
        $list = $this->where($map)->order($order)->field($field)->paginate($size,false,['query'=>request()->param()]);
        return $list;
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($uid, $jine, $type, $note = "")
    {
        $type_text = array(
            1 => '佣金提现',
        );
        $note = array(
            1 => '佣金提现',
        );
        $array = array(
            'us_id' => $uid,
            'wa_num' => $jine,
            'wa_type' => $type,
            'wa_type_text' => $type_text[$type],
            'wa_note' => $note[$type],
            'wa_add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insertGetId($array);
        if ($rel) {
            if (in_array($type, array(1))) {
                model('User')->where('id', $uid)->setDec('us_msc', $jine);
            }else{
                model('User')->where('id', $uid)->setInc('wallet', $jine);
            }
        }
        return $rel;
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function xiugai($data, $where)
    {
        return $this->save($data, $where);
    }

    //用户账号
    public function getUsTextAttr($value, $data)
    {
        if ($data['us_id'] == "") {
            return '';
        }
        $name = model('User')->where('id', $data['us_id'])->value('us_account');
        return $name;
    }
    //真实姓名
    public function getUsNicknameAttr($value, $data)
    {
        if ($data['us_id'] == "") {
            return '';
        }
        $name = model('User')->where('id', $data['us_id'])->value('us_nickname');
        return $name;
    }
    public function getWaTypeTextAttr($value, $data) {
        $array = [
            1 => 'UZF',
            2 => 'AGB',
            3 => 'BTB',
            4 => '其他',
        ];
        return $array[$data['wa_type']];
    }
    public function getStatusTextAttr($value, $data) {
        $array = [
            1 => '支出',
            2 => '收入',

        ];
        return $array[$data['status']];
    }
    public function getLockTypeTextAttr($value, $data) {
        $array = [
            1 => '可用资金',
            2 => '冻结资金',

        ];
        return $array[$data['lock_type']];
    }
    //个人业绩列表
    public function getWalletListByid($id){
        $list = $this->where('us_id',$id)->where('wa_type','in','1 , 2')->select(); 
        $allmoney = 0;
        foreach ($list as $k => $v) {
            # code...
            $allmoney += $v['wa_num'];
        }
        return [$list , $allmoney];
    }
    //团队业绩列表
    public function getWalletListBypid($id){
        $u_model = model('User');
        $us_path = $u_model->where('id',$id)->value('us_path');
        $us_length = strlen($us_path);
        $list = $this
        ->alias('a')
        ->join('user b' , 'b.id = a.us_id' , 'LEFT')
        ->field('a.* , b.us_nickname')
        ->where('b.us_path', 'like' , '%'.$us_path.','.$id.'%')
        ->where('a.wa_type','in','1 , 2')
        ->select();         
        $allmoney = 0;
        foreach ($list as $k => $v) {
            # code...
            //团队业绩只查询两级的业绩，超出两级的记录删除
            $child_path = $u_model->where('id',$v['us_id'])->value('us_path');
            $child_length = strlen($child_path);
            if($child_length - $us_length > 4){
                unset($list[$k]);
            }
            $allmoney += $v['wa_num'];
        }
        return [$list , $allmoney];
    }

}
