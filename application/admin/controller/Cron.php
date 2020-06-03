<?php
namespace app\admin\controller;

// use app\common\model\Store;
// use app\common\model\Order;
// use app\common\validate;
// use think\Db;
 use think\Controller;
// use app\common\controller\Api;
// use app\common\logic\UserLogic;
// use app\common\model\User; 
/**
 * 乱七八糟控制器
 */
class Cron extends Controller
{

    public function test()
    {
        // $user = model('User');
        // $pwd = '123456';
        // $pass = HmacMd5($pwd,$pwd);
        $safe_password = 'YBVtu/DBQzf1qUUBSkGnSA==';
         $safe_m = decrypt($safe_password);
        // $map['id'] = 1;
        // $path = '/index/user/myHead';
        // $tel = '1555991741459';
        // $safe_p = encrypt('123456');
         // $rel = model('config')->where('id','in',[11,12,138,139])->field('value')->select();
         // foreach ($rel as $key => $value) {
         //    $bank[$key] = $value['value'];  
         // }
         //$addr_id = model('UserAddr')->where('us_id',22)->where('addr_default',1)->value('id');
         //$user = model('user')->order('activate_time asc')->field('id,activate_time')->select();
         // $a = false;
         // $b = true;
         // $rel = $a || $b;
         // $code = encrypt('1');
         // $decode = decrypt($code);
         // $config=config('alipay');
         // $user_first_level = model('user')->where('id',1)->value('us_level');
         // if ($user_first_level == 2) {
         //     echo 0;
         // }
        $map['us_pid'] = 1;
        $map['us_level'] = 2;//是否下单成为VIP用户
        $usid = 11;
        $array_ids = model('user')->where($map)->order('activate_time asc')->field('id,activate_time')->select();
        $award1 = cache('setting')['award1']/100;
            $award2 = cache('setting')['award2']/100;
            $award3 = cache('setting')['award3']/100;
            foreach ($array_ids as $k => $v) {
                if ($v['id'] == $usid) {
                    $sort = $k + 1;
                    if ($sort%3 == 0) {
                        $percent = $award2;
                    }else{
                        $percent = $award1;
                    }
                }
            }
        // $ming = decrypt($safe_p);
        // $rel = $user->where($map)->setInc('us_first_get',5.00);
        //$rel = model('user')->where('id',1)->value('us_nickname');
        // $account = model('wallet')
        //     ->alias('a')
        //     ->join('order b','a.or_id = b.id','right')
        //     ->join('user c','c.id = b.us_id','right')
        //     ->where('a.us_id',22)
        //     //->where('a.or_id',$value['or_id'])
        //     ->field('us_account')
        //     ->find();
        echo $percent;
        echo '<br>';
        halt($array_ids);
        halt($percent);
    }
    public function ceshi()
    {
        // $pass = "mNHJlXgomjqLlUzpU/s8JQ==";
        // $word = '9bKhruGd881c4dOcIKdbtw==';
        // $pwd = decrypt($pass);
        // $a = 'a+++a6s';
        // $b = 'a8f';
        // if ($a>$b) {
        //     echo 1;
        // }elseif ($a<$b) {
        //     echo 0;# code...
        // }
        //halt($pwd);
     $config = config('alipay');
            $order = [
                'out_trade_no' => time(),
                'body' => 'subject-测试',
                'total_fee' => '1',
            ];
            $alipay = Pay::alipay($config)->wap($order);
    }
    public function header(){
        $password = '9bKhruGd881c4dOcIKdbtw==';//密文
        $ming = decrypt($password);
        $pass = HmacMd5($ming,$ming);
        $datastr = jsDecrypt('G3sbvMNbMNT5ELL7qbxuxZweZyCSedih1OgzD5nAzQQ=',$pass);
        halt($pass);
    }
    public function shi(){
        //$map[] = ['us_path','like','0,1,'.'%'];
        //$map[] = ['us_path','like',$this->user['us_path'].','.$this->user['id'].'%'];
        //dump($map);
        $id = 1;
        $map[] = ['us_pid','=',$id];
        $info = model('user')->where($map)->select();
        $list2 = array();
        $list_all = array();
        foreach ($info as $k => $v) {
            $list2[$k]['tel'] = $v['us_tel']; 
            $list2[$k]['account'] = $v['us_account'];
            $list2[$k]['time'] = $v['us_add_time'];
            $list2[$k]['us_nickname'] = $v['us_nickname'];
            $list2[$k]['level'] = "一级";
            //$map['us_pid'] = $v['id'];
            $secend_array = model('user')->where('us_pid','=',$v['id'])->select();
            //dump($secend_array);
            if (count($secend_array) != 0) {
                foreach ($secend_array as $key => $value) {
                    $list3[$key]['tel'] = $v['us_tel']; 
                    $list3[$key]['account'] = $v['us_account'];
                    $list3[$key]['time'] = $v['us_add_time'];
                    $list3[$key]['us_nickname'] = $v['us_nickname'];
                    $list3[$key]['level'] = "二级";
                }
                $list_all = array_merge($list_all,$list3);
            }
           // $list_all = array_merge($list_all,$list3);

        }
        // $data['first'] = $list2;
        $data['secend'] = array_merge($list2,$list_all);
        halt($data);
    }
    /**
     * [share 每月分红奖励发放]
     * @return [type] [description]
     */
    public function share(){
        $us_array = model('user')->field('id')->select();
        //halt($us_array);
        
        foreach ($us_array as $key => $value) {
            $id_array[$value['id']] = $value['id']; 
        }
        //$arr = [][][];
        foreach ($id_array as $key => $value) {
            $a = model('user')->field('id')->where('us_pid',$value)->select();
            if (count($a) == 0) {
                $arr[$key] = $value;
            }else{
                 foreach ($a as $k => $v) {
                    $arr[$key][$v['id']] = $v['id'];
                 }
            }           
        }
        //halt($arr);
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                        $b = model('user')->field('id')->where('us_pid',$v)->select();
                        if (count($b) == 0) {
                            $ar[$key][$k] = $v; 
                        }else{
                            foreach ($b as $h => $r) {
                                $ar[$key][$r['id']] = $r['id'];
                                $ar[$key][$k] = $k;
                            }
                        }    
                }
                
            }else{
                $ar[$key] = $arr[$key];
            }
            
        }
        //halt($ar);
        foreach ($ar as $key => $value) {
            if (is_array($value)) {
                $month_award=[];
                foreach ($value as $k => $v) {
                    $total = 0;
                    
                    $first_person_nums = model('user')->where('us_pid','=',$key)->count();
                    if ($first_person_nums>=3 && $first_person_nums <= 17) {
                        $percent = 0.005;
                    }elseif($first_person_nums>=18 && $first_person_nums <= 59){
                        $percent = 0.01;
                    }elseif($first_person_nums>=60){
                        $percent = 0.025;
                    }
                    $map['us_id'] = $v;
                    $orders = model('order_detail')
                            ->alias('a')
                            ->join('order b','a.or_id = b.id')
                            ->where($map)
                            ->where('a.ca_id','<>',21)
                            ->whereIn('or_status','1,2,3')
                            ->where('year(or_add_time) = year(now()) and month(or_add_time) = month(now())')
                            ->field('or_pd_price,or_pd_num')
                            ->select();
                    if (count($orders) != 0) {
                        foreach ($orders as $h => $r) {
                            
                            $total += $r['or_pd_price'] * $r['or_pd_num'];
                        }
                        $month_award[] = $total * $percent;
                        //echo $key.'本月奖励为：'.$month_award;
                       
                    }
                    
                }
                //print_r($month_award);
                if (array_sum($month_award) != 0) {
                    echo $key.'本月奖励为:'.array_sum($month_award);
                    echo '<br>';
                }else{
                    echo $key.'本月无业绩2';
                    echo '<br>';
                }
                
            }else{
                echo $key.'本月无业绩1';
                echo '<br>';
            }
            
        }
        exit;
        $first_person = model('user')->where('us_pid','=',1)->count();
        //halt($first_person);
        //计算所直辖本月的销售额度
        $map['us_id'] = 1;
        // $map['or_add_time'] = month(getdate());
        // month(creat_date)=month(getdate())
        //$map[] = ['ca_id','<>',21];
        $orders = model('order_detail')
                ->alias('a')
                ->join('order b','a.or_id = b.id')
                ->where($map)
                ->where('a.ca_id','<>',21)
                ->whereIn('or_status','1,2,3')
                ->where('year(or_add_time) = year(now()) and month(or_add_time) = month(now())')
                ->field('or_pd_price,or_pd_num')
                ->select();
        foreach ($orders as $key => $value) {
            
            $total += $value['or_pd_price'] * $value['or_pd_num'];
        }
        halt($total);
    }
}
