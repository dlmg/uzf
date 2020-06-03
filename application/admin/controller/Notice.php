<?php
/**
 * Created by sunpf
 * User: Administrator
 * Date: 2019年4月10日 9:45
 * 
 */
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Container;

/**
* 消息控制器
*/
class Notice extends Common
{
	protected $order;
	public function __construct()
	{
		parent::__construct();
		$this->order = 'id desc';
	}
	//通告列表
	public function index(){
		$map = [];
		$list = model('Notice')->where($map)->order($this->order)->paginate(10);
		$this->assign(array('list'=>$list));
		
		return $this->fetch();
	}
	public function add(){
		if (is_post()) {
			$request = input('post.');
			if ($request['title'] == "" || $request['simple'] == "" || $request['content'] == "") {
				$this->error('标题，内容，描述不能为空');
			}
			$data = array(
				'title' =>$request['title'] ,
				'add_time' =>date('Y-m-d H:i:s'),
				
				'simple' => $request['simple'],
				'content' =>$request['content'],
				 );
			$res = model('Notice')->save($data);
			if ($res) {
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
		return $this->fetch();
	}
	public function edit(){
		$id = input('id');
		if (is_post()) {
			$data = array(
				'title' =>input('title') ,
				'simple'=>input('simple'),
				'content'=>input('content'),
			 );
			$res = model('Notice')->save($data,['id'=>$id]);
			if ($res) {
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		$info = model('Notice')->get($id);
		$this->assign('info',$info);
		return $this->fetch();
	}
	public function del(){
		$id = input('post.id');
		if (!$id) {
			$this->error('非法操作');
		}else{
			$info = model('Notice')->get($id);
		}
		if (!$info) {
			$this->error('非法操作');
		}else{
			$res = model('Notice')->destroy($id);
		}
		if($res){
			$this->success('删除成功');
		}
	}
}



?>