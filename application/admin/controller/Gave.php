<?php
namespace app\admin\controller;
use think\Controller;

/**
 * sunpf
* 每月定时发放奖励（草津堂生物药膳）
*/
class Gave extends Controller
{
	public function test(){
        $award = cache('setting')['award3']/100;
        $map['us_id'] = 15;
        $total = 0;
		 $orders = model('order_detail')
                            ->alias('a')
                            ->join('order b','a.or_id = b.id')
                            ->join('user c','b.us_id = c.id')
                            ->where($map)
                            ->where('a.ca_id','in',[9,10,11])
                            ->where('or_add_time','<=','activate_time')
                            ->whereIn('or_status','1,2,3')
                            ->where('year(or_add_time) = year(now()) and month(or_add_time) = month(now())')
                            ->field('or_pd_price,or_pd_num,activate_time,or_add_time')
                            ->select();
        if (count($orders) != 0) {
            foreach ($orders as $h => $r) {
                $total += $r['or_pd_price'] * $r['or_pd_num'];
            }
            $month_award[] = $total * 1;
            
           
        }
        $sum_award = array_sum($month_award);
        echo date('Y-m-d H:i:s');
        echo '<br>';
        echo date('Y-m-d H:i:s');
        halt($orders);
	}
	/**
     * [share 每月分红奖励发放]
     * @return [type] [description]
     */
    public function share(){

        $us_array = model('user')->field('id')->select();
        
        foreach ($us_array as $key => $value) {
            $id_array[$value['id']] = $value['id']; 
        }
        
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
                    
                    $first_person_nums = model('user')->where('us_pid','=',$key)->where('us_level','=',2)->count();
                    $vip = model('user')->where('id','=',$key)->value('us_level');
                    if ($first_person_nums>=3 && $first_person_nums <= 17) {
                        $percent = cache('setting')['award8']/100;
                        //$percent = 0.005;
                    }elseif($first_person_nums>=18 && $first_person_nums <= 59){
                        $percent = cache('setting')['award9']/100;
                        //$percent = 0.01;
                    }elseif($first_person_nums>=60){
                        $percent = cache('setting')['award10']/100;
                        //$percent = 0.025;
                    }else{
                         $percent = 0;
                    }
                    if ($vip != 2) {
                        $percent = 0;
                    }
                    $map['us_id'] = $v;
                    $orders = model('order_detail')
                            ->alias('a')
                            ->join('order b','a.or_id = b.id')
                            ->join('user c','b.us_id = c.id')
                            ->where($map)
                            ->where('a.ca_id','<>',9)
                            ->where('or_add_time','<=','activate_time')
                            ->whereIn('or_status','1,2,3')
                            ->where('year(or_add_time) = year(now()) and month(or_add_time) = month(now())')
                            ->field('or_pd_price,or_pd_num')
                            ->select();
                    if (count($orders) != 0) {
                        foreach ($orders as $h => $r) {
                            
                            $total += $r['or_pd_price'] * $r['or_pd_num'];
                        }
                        $month_award[] = $total * $percent;
                        
                       
                    }
                    
                }
                //print_r($month_award);
                $sum_award = array_sum($month_award);
                if ($sum_award != 0) {
                    // echo $key.'本月奖励为:'.$sum_award;
                    // echo '<br>';
                   
                    $data_w['or_id'] = date('m'). '月份分红奖励';
                    $data_w['us_id'] = $key;
                    $data_w['wa_num'] = $sum_award;
                    $data_w['wa_type'] = 4;
                    $data_w['wa_note'] = "月底分红奖励";
                    $data_w['add_time'] = date('Y-m-d H:i:s');
                    $wa = model('Wallet');
                    $wa->startTrans();
                    $wa1_rel2 = model('Wallet')->addInfo($data_w);
                    $user = model('user');
                    $user->startTrans();
                    $rel2 = model('user')->where('id',$key)->setInc('us_share_bonus',$sum_award);
                    $relall = model('user')->where('id',$key)->setInc('us_all_bonus',$sum_award);
                    if ($rel2&&$wa1_rel2) {
                        $user->commit();
                        $wa->commit();
                        echo $key.'本月奖励为:'.$sum_award;
                        echo '<br>';
                    }else{
                        $user->rollback();
                        $wa->rollback();
                        echo  $key.'的月底分红奖励发放失败！';
                        echo '<br>';
                    }
                }else{
                    echo $key.'本月无业绩2';
                    echo '<br>';
                }
                
            }else{
                echo $key.'本月无业绩1';
                echo '<br>';
            }
            
        }
        
    }

}
?>
<script>
closewin();
function closewin(){
    var browserName=navigator.appName;
    if(browserName=="Netscape"){
        var opened=window.open('about:blank','_self');
        opened.opener=null;
        opened.close();
    }else if(browserName=="Microsoft Internet Explorer"){
        window.opener=null;
        window.open('','_self');
        window.close();
    }
}
</script>
