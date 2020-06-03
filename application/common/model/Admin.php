<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Admin extends Model
{
    public function getRoleAttr($value, $data)
    {
        return db('role')->where('id', $data['ro_id'])->value('ro_name');
    }
    public function getPidtextAttr($value, $data)
    {
        return $this->where('Id', $data['pid'])->value('work_number');
    }
    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function getList($map, $order = '', $size = 10, $field = "*")
    {

        $list = $this->where($map)->order($order)->field($field)->paginate($size);
        return $list;
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function addAdmin($data)
    {
        $count = $this->where('ad_tel', $data['ad_tel'])->count();
        if ($count) {
            return [
                'code' => 0,
                'msg' => '手机号已存在',
            ];
        }
        // 工号
        $work_number = $this->order('Id desc')->value('ad_work_number');
        if ($work_number) {
            $bb = substr($work_number, -5);
            $cc = substr($work_number, 0, 3);
            $dd = $bb + 1;
            $new_work_number = $cc . $dd;
        } else {
            $new_work_number = 'YXG10001';
        }
        //var_dump($new_work_number);exit();

        $data['ad_work_number'] = $new_work_number;
        $data['ad_pwd'] = md5($data['ad_pwd']);
        $data['add_time'] = date('Y-m-d H:i:s');
        $rel = $this->insertGetid($data);
        if ($rel) {
            return [
                'code' => 1,
                'msg' => '添加成功',
                'data' => $rel,
            ];
        }
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function editAdmin($data, $where)
    {
        //var_dump($data);
        if (array_key_exists('ad_pwd', $data)) {
            if($data['ad_pwd']){
                $data['ad_pwd'] = md5($data['ad_pwd']);
            }else{
                unset($data['ad_pwd']);
            }                                
        }      
        $rel = $this->where($where)->update($data);
        if ($rel) {
            return [
                'code' => 1,
                'msg' => '修改成功',
                'data' => $rel,
            ];
        } else {
            return [
                'code' => 0,
                'msg' => '您并没有做出修改',
            ];
        }
    }

}