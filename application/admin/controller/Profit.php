<?php
namespace app\admin\controller;
use PHPExcel;
use PHPExcel_IOFactory;
use think\Request;
/**
 * 利润表
 */
class Profit extends Common
{

    public function __construct()
    {
        parent::__construct();
    }
    //财富记录
    public function index()
    {
        if (is_post()) {

            $rst = model('Wallet')->xiugai([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            return $rst;
        }
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_account|us_real_name|us_tel','like','%'.input('get.keywords').'%')->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        if (input('get.wa_type') != "") {
            $this->map[] = ['wa_type', '=', input('get.wa_type')];
        }
        $list = model('Wallet')->chaxun($this->map, $this->order, $this->size);
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
    //提现记录
    public function commission()
    {
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_nickname|us_tel', 'like','%'.input('get.keywords').'%')->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['tx_add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['tx_add_time', '<=', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['tx_add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        if (input('get.wa_type') != "") {
            $this->map[] = ['wa_type', '=', input('get.wa_type')];
        }
        //halt($this->map);
        $this->map[] = ['tx_status', 'gt', 0];
        //$field = 'a.*,b.us_nickname';
        $list = model('Tixian')->chaxun($this->map, $this->order, $this->size);
        // halt($list);
        foreach ($list as $k => $v) {
            if($v['tx_type'] == 1){
                $ac = 'bank_account'; 
                $list[$k]['tx_account'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_account');
                $list[$k]['bank_name'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_name');
            }elseif($v['tx_type'] == 2){
                $account = 'we_account';
                $list[$k]['tx_account'] = model('User')->where('id',$v['us_id'])->value($account);
                $list[$k]['bank_name'] = "";
            }elseif($v['tx_type'] == 0){
                $account = 'ali_account';
                $list[$k]['bank_name'] = "";
                $list[$k]['tx_account'] = model('User')->where('id',$v['us_id'])->value($account);
            }
        }
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
    //提现记录
    public function commissionrecord()
    {
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_nickname|us_tel', input('get.keywords'))->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['tx_add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['tx_add_time', '<=', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['tx_add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        if (input('get.wa_type') != "") {
            $this->map[] = ['wa_type', '=', input('get.wa_type')];
        }
        //halt($this->map);
        $this->map[] = ['tx_status', 'eq', 1];
        //$field = 'a.*,b.us_nickname';
        $list = model('Tixian')->chaxun($this->map, $this->order, $this->size);
        // halt($list);
        foreach ($list as $k => $v) {
            if($v['tx_type'] == 1){
                $ac = 'bank_account'; 
                $list[$k]['tx_account'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_account');
                $list[$k]['bank_name'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_name');
            }elseif($v['tx_type'] == 2){
                $account = 'we_account';
                $list[$k]['tx_account'] = model('User')->where('id',$v['us_id'])->value($account);
                $list[$k]['bank_name'] = "";
            }elseif($v['tx_type'] == 0){
                $account = 'ali_account';
                $list[$k]['bank_name'] = "";
                $list[$k]['tx_account'] = model('User')->where('id',$v['us_id'])->value($account);
            }
        }
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
    public function commissionapply(){
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_nickname|us_tel', input('get.keywords'))->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        $this->map[] = ['tx_status', 'eq', 0];
        //$field = 'a.*,b.us_nickname';
        $list = model('Tixian')->chaxun($this->map, $this->order, $this->size);
        // halt($list);
        foreach ($list as $k => $v) {
            if($v['tx_type'] == 1){
                $ac = 'bank_account'; 
                $list[$k]['tx_account'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_account');
                $list[$k]['bank_name'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_name');
            }elseif($v['tx_type'] == 2){
                $account = 'we_account';
                $list[$k]['tx_account'] = model('User')->where('id',$v['us_id'])->value($account);
                $list[$k]['bank_name'] = "";
            }elseif($v['tx_type'] == 0){
                $account = 'ali_account';
                $list[$k]['bank_name'] = "";
                $list[$k]['tx_account'] = model('User')->where('id',$v['us_id'])->value($account);
            }
            
        }
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
    //给予提现
    public function change(){
        if (is_post()) {
            $data[input('post.key')] = input('post.value');
            $data['tx_add_time'] = date('Y-m-d H:i:s');
            $rst = model('Tixian')->saveInfo($data, ['id' => input('post.id')]);
            if($rst){
                return [
                    'code' => '1',
                    'msg' => '审批成功'
                ];
            }
            return [
                    'code' => '0',
                    'msg' => '审批失败'
                ];
        }
    }
    //驳回提现
    public function change2(){
        if (is_post()) {
            $data[input('post.key')] = input('post.value');
            $data['tx_back_time'] = date('Y-m-d H:i:s');
            $rst = model('Tixian')->saveInfo($data, ['id' => input('post.id')]);
            $info = model('Tixian')->where('id',input('post.id'))->find();
            model('User')->where('id',$info['us_id'])->setInc('us_shop_bi',$info['tx_num']);
            if($rst){
                return [
                    'code' => '1',
                    'msg' => '驳回成功'
                ];
            }
            return [
                    'code' => '0',
                    'msg' => '驳回失败'
                ];
        }
    }
    //微信支付记录
    public function wechat()
    {
        if (is_post()) {

            $rst = model('Order')->xiugai([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            return $rst;
        }
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_account|us_real_name|us_tel', input('get.keywords'))->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        if (input('get.wa_type') != "") {
            $this->map[] = ['wa_type', '=', input('get.wa_type')];
        }
        $list = model('PayWechat')->chaxun($this->map, $this->order, $this->size);

        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
    public function paylist()
    {
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_nickname|us_tel', input('get.keywords'))->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        $field = 'a.* , b.us_nickname , b.us_tel , b.us_account';
        $paymodel = model('PayWechat');
        $list = $paymodel->chaxun($this->map, $this->order, $this->size , $field);
        $todaysold = $paymodel->where('status',1)->whereTime('add_time','today')->sum('money');
        $allsold = $paymodel->where('status',1)->sum('money');
        $this->assign(array(
            'list' => $list,
            'todaysold' => $todaysold,
            'allsold' => $allsold,
        ));
        return $this->fetch();
    }
    public function excel(){//导出Excel
        $xlsName  = "提现记录";
        $xlsCell  = array(
            array('tx_name','提现人姓名'),
            array('tx_idcard','提现人身份证'),
            array('tx_account','提现账号'),
            array('tx_type','账户类型'),
            array('bank_name','开户行'),
            array('tx_num','提现金额'),
            array('tx_apply_time','申请时间'),
            array('tx_add_time','审批时间'),
        );
        $this->map[] = ['tx_status', 'eq', 1];
        //$field = 'a.*,b.us_nickname';
        $xlsData  = db('Tixian')->Field('tx_name,tx_idcard,tx_account,tx_type,tx_num,tx_apply_time,tx_add_time,us_id')->where($this->map)->select();
        foreach ($xlsData as $k => $v) {
            if($v['tx_type'] == 1){
                $xlsData[$k]['tx_type'] = '银行卡';
                $xlsData[$k]['bank_name'] = model('banks')->where('id',$v['us_id'])->where('status',1)->value('bank_name');
            }elseif($v['tx_type'] == 2){
                $xlsData[$k]['tx_type'] = '微信';
                 $xlsData[$k]['bank_name'] = '';
            }elseif($v['tx_type'] == 0){
                $xlsData[$k]['tx_type'] = '支付宝';
                $xlsData[$k]['bank_name'] = '';
            }
            //$xlsData[$k]['bank_name'] = model('banks')->where('id',$v['us_id'])->value('bank_name');
        }
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }
    function exportExcel($expTitle,$expCellName,$expTableData){
        //include_once EXTEND_PATH.'PHPExcel/PHPExcel.php';//方法二
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        $objPHPExcel = new PHPExcel();//方法一
        //$objPHPExcel = new \PHPExcel();//方法二
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  表格生成时间:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
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
    /**
     * 现金积分明细表
     * @Author   fengkl
     * @DateTime 2018-09-25T15:32:30+0800
     * @return   [type]                   [description]
     */
    public function birecord()
    {
        if (input('get.keywords')) {
            $us_id = model("User")->where('us_tel', input('get.keywords'))->value('id');
            if (!$us_id) {
                $us_id = 0;
            }
            $this->map[] = ['us_id', '=', $us_id];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['add_time', '=<', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        if (input('get.wa_type')) {
            $this->map[] = ['wa_type', '=', input('get.wa_type')];
        }
        $list = model('wallet')->getList($this->map, $this->order, $this->size, '');
        $this->assign('list',$list);
        return $this->fetch();
    }

    
}
