<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月25日 10:38:27
 * 
 */

namespace app\admin\controller;

use app\common\logic\OrderLogic;
use app\common\model\Order as OrderModel;
use think\Db;
use think\Container;
use PHPExcel;
use PHPExcel_IOFactory;

class Order extends Common
{
    /**
     * 订单列表
     * author fengkl
     * time 2018年5月25日 10:40:07
     * @return mixed
     */
    public function index()
    {
        $Order = new OrderLogic;
        if (input('get.or_num')) {
            $this->map[] = ['or_num', 'like', '%'.input('get.or_num').'%'];
        }
        if (is_numeric(input('get.or_status'))) {
            $this->map[] = ['or_status', '=', input('get.or_status')];
        }
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['or_add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['or_add_time', '<=', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['or_add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        //halt(input('get.'));
        if (is_post()) {
            $rst = model('Order')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
        $ad_info = session('admin');
        //halt($ad_info);
        /*$st_id_arr = 0;
        if($ad_info['ro_id'] == 7){
            $area_info = model('area_store')->where('ad_id',$ad_info['id'])->select();
            foreach ($area_info as $k => $v) {
                $store_info = model('store')->where('area_id',$v['id'])->select();               
                foreach ($store_info as $key => $value) {
                    $st_id_arr = $st_id_arr.','.$value['id'];
                }
            } 
            //halt($st_id_arr); 
            $this->map[] = ['st_id', 'in', $st_id_arr];       
        }elseif($ad_info['ro_id'] == 8) {
            $store_info = model('store')->where('ad_id',$ad_info['id'])->select();               
            foreach ($store_info as $key => $value) {
                $st_id_arr = $st_id_arr.','.$value['id'];
            }
            //halt($st_id_arr);
            $this->map[] = ['st_id', 'in', $st_id_arr];
        }*/        
        $list = $Order->getList($this->map, $this->order, $this->size);
        foreach ($list as $k => $v) {
//           $total = $this->getdetail($v['id']);
           //halt($total);
           $list[$k]['or_total'] = $total['list']['total'];
        } 
        //halt($list);

        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
            'st_list' => $st_list,
        ));
        return $this->fetch();

    }
    //修改发货状态
    //fkl
    //2018年6月13日 16:25:10
    public function change(){
        if (is_post()) {
            $rst = model('Order')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
    }

    //删除
    //fkl
    //2018年6月11日 17:08:23
    public function dodelete(){
        $every = new Every;
        $data = input('post.');
        //halt($data);
        $rel = $every->allDel($data);
    }

    public function getdetail($id)
    {
        $map['or_id'] = $id;
        $list = model('OrderDetail')->detail($map);
        $total = 0;
        $take_fee = 0;
        $pd_model = model('Product');
        foreach ($list as $k => $v) {
            $goodsinfo = $pd_model->find($v['pd_id']);
//            $total += $v['or_pd_num'] * $goodsinfo['pd_price'];
//            if($goodsinfo['take_fee'] > $take_fee){
//                $take_fee = $goodsinfo['take_fee'];
//            }
            $pics = explode(",", $v['or_pd_pic']);
            if(!$pics[0]){
                array_shift($pics);
            }
            $list[$k]['or_pd_pic'] = $pics;
        }
//        $list['total'] = $total + $take_fee;
//        $addr = model('Order')->getAddr($id);
//        $addr['addr_add'] = $addr['province'].$addr['city'].$addr['area'].$addr['addr_detail'];
        //halt($list);
        return array(
            'list' => $list,
//            'addr' => $addr,
        );
    }
    /**
     * 订单详情
     * author fengkl
     * time 2018年5月25日 11:38:36
     * @return mixed
     */
    public function detail($id)
    {
        $info = $this->getdetail($id);
//        $voucher = model('Order')->where('id',$id)->value('or_voucher');
        $remark = model('Order')->where('id',$id)->value('or_remark');
        $this->assign($info);
        $this->assign('id',$id);
//        $this->assign('voucher',$voucher);
        $this->assign('remark',$remark);
        return $this->fetch();
    }
    
    /**
     * 线下审核
     * author sunpf
     * time 2019年4月16日
     */
    public function approval($id,$uid){
        $voucher = model('Order')->where('id',$id)->value('or_voucher');
        $this->assign('uid',$uid);
        $this->assign('voucher',$voucher);
        $this->assign('id',$id);
        return $this->fetch();
    }
    //线下审核
    //author sunpf
    //time 2019年4月16日
    public function doapproval(){
        if (is_post()) {
            $Order = new OrderLogic;
            $data = input('post.');
            $where['id'] = $data['or_id'];
            $whereu['uid'] = $data['uid'];
            $vip = model('user')->where($whereu)->value('us_level');
            
            $or_status = model('order')->where($where)->value('or_status');
            $ca_id = model('order')->where($where)->value('ca_id');
            if ($vip == 2 && $ca_id == 11) {
                return [
                    'code' => 0,
                    'msg' => '该用户已经是VIP，不能再报单了',
                    ];
            }
            if($or_status != 5){
                return [
                    'code' => 0,
                    'msg' => '该订单不是待审核订单',
                    ];
            }
            $arrays = $Order->getOneOrder($data['or_id']);
            $catid = $arrays[0]['ca_id'];
            foreach ($arrays as $key => $value) {
                $total = 0;
                $total  += $value['or_pd_price']*$value['or_pd_num'];
            }
            $awa =$Order->gaveAward($total,$data['or_id']);
            if ($awa['code']==0) {
                return json($awa); 
            }
            // halt($awa);
            // exit;
            
            // $us_is_order = model('user')->where($whereu)->value('us_is_order');
            // if ($us_is_order == 0) {
            //     $data2['us_is_order'] = 1;
            //     $res = model('user')->editInfo($data2, $whereu);
            //     if (!$res) {
            //         return [
            //         'code' => 0,
            //         'msg' => '审核失败（用户是否首单）',
            //         ];
            //     }
            // }
            if ($total >= 499 && $vip == 0) {
                $data1['us_level'] = 2;
                $data1['activate_time'] = date('Y-m-d H:i:s');              
                $res = model('user')->editInfo($data1, $whereu);
                $dat['add_time'] = date('Y-m-d H:i:s');
                $rel_time = model('order')->where('id',$data['or_id'])->updateInfo($dat);
                if (!$res) {
                    return [
                    'code' => 0,
                    'msg' => '审核失败（VIP会员激活失败）',
                    ];
                }
            }
            

            $data['or_status'] = 1;
            $res = model('Order')->editInfo($data, $where);
            if ($res) {
                return [
                    'code' => 1,
                    'msg' => '审核通过',
                ];
            }else{
                return [
                    'code' => 0,
                    'msg' => '审核失败',
                ];
            }
        }
       
    }

    //发货
    //2018年6月28日 19:00:32
    //fkl
    public function deliver($id){

        $this->assign('id',$id);
        return $this->fetch();
    }
    /**
     * 发货
     * author fengkl
     * time 2018年5月29日 15:46:40
     * @return mixed
     */
    public function dodeliver()
    {
        if (is_post()) {
            $data = input('post.');
            $validate = validate('Verify');
            $rel = array();
            $rstt = $validate->scene('deliver')->check($data);
            if (!$rstt) {
                $rel['code'] = 0;
                $rel['msg'] = $validate->getError();
                return $rel;
            }
            $where['id'] = $data['or_id'];
            unset($data['or_id']);
            $or_status = model('order')->where($where)->value('or_status');
            if($or_status != 1){
                return [
                    'code' => 0,
                    'msg' => '该订单不是待发货订单',
                    ];
            }
            $data['or_status'] = 2;
            $data['deliver_time'] = date('Y-m-d H:i:s');
            $rst = model('Order')->editInfo($data, $where);
            $where2['or_id'] = $where['id'];
            $or_detail = model('OrderDetail')->detail($where2);
            $total = 0;
            $take_fee = 0;
            $pd_model = model('Product');
            foreach ($or_detail as $k => $v) {
                $pd_where['id'] = $v['pd_id'];
                $rel1 = $pd_model->where($pd_where)->setInc('pd_sales',$v['or_pd_num']);
                $rel2 = $pd_model->where($pd_where)->setDec('pd_inventory',$v['or_pd_num']);
                $goodsinfo = $pd_model->find($v['pd_id']);
                $total += $v['or_pd_num'] * $goodsinfo['pd_price'];
                if($goodsinfo['take_fee'] > $take_fee){
                    $take_fee = $goodsinfo['take_fee'];
                }               
                if(!$rel1 || !$rel2){
                    return [
                    'code' => 0,
                    'msg' => '库存或销量更新失败',
                    ];
                    //$this->e_msg('库存或销量更新失败');
                }               
            }
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '发货成功',
                ];
            }
            return [
                    'code' => 0,
                    'msg' => '发货失败',
                ];
        }
    }
    //导出订单列表
    public function excellist(){//导出Excel
        //$data = input('get.');
        if (input('get.ornum')) {
            $this->map[] = ['or_num', 'like', '%'.input('get.ornum').'%'];
        }
        if (is_numeric(input('status'))) {
            $this->map[] = ['or_status', '=', input('get.status')];
        }
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['or_add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['or_add_time', '<=', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['or_add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        $Order = new OrderLogic;
        $list = $Order->getListNpg($this->map, $this->order, $this->size);
        foreach ($list as $k => $v) {
            $list[$k]['detail'] = '';
           $goods = $this->getdetail($v['id']);
          
           $list[$k]['addr_receiver'] = $goods['addr']['addr_receiver'];
           $list[$k]['addr_addr'] = $goods['addr']['addr_add'];
           $list[$k]['addr_tel'] = $goods['addr']['addr_tel'];
           $list[$k]['total'] = $goods['list']['total'];
           unset($goods['list']['total']);
            foreach ($goods['list'] as $key => $value) {
              $list[$k]['detail'] .= $value['or_pd_name'].'*'.$value['or_pd_num'].';';
           }


        } 
        //halt($list);
        //$info = $this->getdetail($id);
        $xlsName  = "订单列表";
        $xlsCell  = array(
            array('or_num','订单编号'),
            array('addr_receiver','收货人'),
            array('addr_addr','收货地址'),
            array('addr_tel','联系电话'),
            array('detail','商品详情'),
            array('total','订单总额'),
            array('or_status','订单状态'),
            array('or_remark','客户留言'),
            // array('addr_add','收货地址'),
        );
        $xlsData  = array();
        // halt($info['list']);
        //unset($info['list']['total']);
        foreach ($list as $k => $v) {
            $xlsData[$k]['or_num'] = $v['or_num'];
            $xlsData[$k]['addr_receiver'] = $v['addr_receiver'];
            $xlsData[$k]['addr_addr'] = $v['addr_addr'];
            $xlsData[$k]['addr_tel'] = $v['addr_tel'];
            $xlsData[$k]['detail'] = $v['detail'];
            $xlsData[$k]['total'] = $v['total'];
            $xlsData[$k]['or_status'] = $v['or_status'];
            switch ($v['or_status']) {
                case 0:
                    $xlsData[$k]['or_status'] = '未付款';
                    break;
                case 1:
                    $xlsData[$k]['or_status'] = '待发货';
                    break;
                case 2:
                    $xlsData[$k]['or_status'] = '待收货';
                    break;
                case 3:
                    $xlsData[$k]['or_status'] = '已完成';
                    break;
                case 4:
                    $xlsData[$k]['or_status'] = '已取消';
                    break;
                case 5:
                    $xlsData[$k]['or_status'] = '待审核';
                    break;
            }
            $xlsData[$k]['or_remark'] = $v['or_remark'];

            // $xlsData[$k]['addr_tel'] = $info['addr']['addr_tel'];
            // $xlsData[$k]['addr_add'] = $info['addr']['addr_add'];
        }
        // $topData = array();
        // $topData['addr_receiver'] = $info['addr']['addr_receiver'];
        // $topData['addr_tel'] = $info['addr']['addr_tel'];
        // $topData['addr_add'] = $info['addr']['addr_add'];
        // halt($xlsData);
        $this->exportExcelall($xlsName,$xlsCell,$xlsData);
    }
    //单个订单详情
    public function excel($id){//导出Excel
        $info = $this->getdetail($id);
        $xlsName  = "订单详情";
        $xlsCell  = array(
            array('or_pd_name','商品名称'),
            array('or_pd_price','商品价格'),
            array('or_pd_num','商品数量'),
            // array('or_pd_content','商品描述'),
            // array('pd_color','颜色分类'),
            array('pd_spec','商品规格'),
            // array('addr_receiver','收货人'),
            // array('addr_tel','电话'),
            // array('addr_add','收货地址'),
        );
        $xlsData  = array();
        // halt($info['list']);
        unset($info['list']['total']);
        foreach ($info['list'] as $k => $v) {
            $xlsData[$k]['or_pd_name'] = $v['or_pd_name'];
            $xlsData[$k]['or_pd_price'] = $v['or_pd_price'];
            $xlsData[$k]['or_pd_num'] = $v['or_pd_num'];
            // $xlsData[$k]['or_pd_content'] = $v['or_pd_content'];
            // $xlsData[$k]['pd_color'] = $v['pd_color'];
            $xlsData[$k]['pd_spec'] = $v['pd_spec'];
            // $xlsData[$k]['addr_receiver'] = $info['addr']['addr_receiver'];
            // $xlsData[$k]['addr_tel'] = $info['addr']['addr_tel'];
            // $xlsData[$k]['addr_add'] = $info['addr']['addr_add'];
        }
        $topData = array();
        $topData['addr_receiver'] = $info['addr']['addr_receiver'];
        $topData['addr_tel'] = $info['addr']['addr_tel'];
        $topData['addr_add'] = $info['addr']['addr_add'];
        // halt($xlsData);
        $this->exportExcel($xlsName,$xlsCell,$xlsData,$topData);
    }
    function exportExcel($expTitle,$expCellName,$expTableData,$topData){
        //include_once EXTEND_PATH.'PHPExcel/PHPExcel.php';//方法二
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        $num = $dataNum + 4;
        $objPHPExcel = new PHPExcel();//方法一
        //$objPHPExcel = new \PHPExcel();//方法二
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->getActiveSheet(0)->mergeCells('A'.$num.':'.$cellName[$cellNum-1].$num);//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  表格生成时间:'.date('Y-m-d H:i:s')); 
        //头部收货人信息 
        $objPHPExcel->getActiveSheet(0)->mergeCells('A2:'.$cellName[$cellNum-1].'2');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '收货人：'.$topData['addr_receiver'].'        电话：'.$topData['addr_tel'].'        收货地址：'.$topData['addr_add']);       
        // halt($num);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$num, '制表人:                      ' . '会计：                      ' . '出纳：                      ' . '审核：                      ');
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'3', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+4), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        ob_end_clean();//这一步非常关键，用来清除缓冲区防止导出的excel乱码
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//"xls"参考下一条备注
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//"Excel2007"生成2007版本的xlsx，"Excel5"生成2003版本的xls
        $objWriter->save('php://output');
        exit;
    }
    //订单列表导出专用
    function exportExcelall($expTitle,$expCellName,$expTableData){
        //include_once EXTEND_PATH.'PHPExcel/PHPExcel.php';//方法二
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        $num = $dataNum + 4;
        $objPHPExcel = new PHPExcel();//方法一
        //$objPHPExcel = new \PHPExcel();//方法二
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->getActiveSheet(0)->mergeCells('A'.$num.':'.$cellName[$cellNum-1].$num);//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  表格生成时间:'.date('Y-m-d H:i:s')); 
        //头部收货人信息 
        $objPHPExcel->getActiveSheet(0)->mergeCells('A2:'.$cellName[$cellNum-1].'2');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$num, '制表人:                      ' . '会计：                      ' . '出纳：                      ' . '审核：                      ');
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'3', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+4), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        ob_end_clean();//这一步非常关键，用来清除缓冲区防止导出的excel乱码
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//"xls"参考下一条备注
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//"Excel2007"生成2007版本的xlsx，"Excel5"生成2003版本的xls
        $objWriter->save('php://output');
        exit;
    }

}