<?php
namespace app\admin\controller;

/**
 * @todo 管理员、角色、权限管理
 */
class Admin extends Common {
	// 管理员列表
	public function index() {
		if (is_post()) {
			$rst = model('Admin')->editAdmin([input('post.key') => input('post.value')], ['id' => input('post.id')]);
			return $rst;
		}
		if (input('get.keywords')) {
			//$this->map[] = ['ad_tel', 'like',  input('get.keywords')];
			$this->map[] = ['ad_tel|ad_work_number', 'like', '%'.input('get.keywords').'%'];
			
		}
		/*if (is_numeric(input('get.status'))) {
			$this->map[] = ['status', '=', input('get.status')];
		}*/
		//$this->map['delete_status'] = 1;
		$this->map[] = ['delete_status','=',1];
		$list = model('Admin')->getList($this->map);
		$this->assign(array(
			'ro_list' => db('role')->select(),
			'list' => $list,
		));
		return $this->fetch();
	}
	//页面直接修改，启用，角色
	public function change(){
		if (is_post()) {
			$rst = model('Admin')->editAdmin([input('post.key') => input('post.value')], ['id' => input('post.id')]);
			return $rst;
		}
	}
	//添加
	public function add() {
	    $every = new Every;
		if (is_post()) {
			$data = input('post.');
			//var_dump($data);exit();
			$validate = validate('Verify');
			$res = $validate->scene('addAdmin')->check($data);
			if (!$res) {
				$this->error($validate->getError());
			}

			$rel = model('Admin')->addAdmin($data);
			if ($rel['code'] == 1){
                $loginfo['style'] = 2;
                $loginfo['table'] = 'admin';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $rel['data'];
                $loginfo['note'] = '添加管理员';
                $every->logger($loginfo);
            }
			return $rel;
		}
		$this->assign('ro_list', db('role')->select());
		return $this->fetch();
	}
	public function edit() {
        $every = new Every;
		if (is_post()) {
			$validate = validate('Verify');
			$res = $validate->scene('editAdmin')->check(input('post.'));
			if (!$res) {
				$this->error($validate->getError());
			}

			$rel = model('admin')->editAdmin(input('post.'), ['id' => input('post.id')]);
            if ($rel['code'] == 1){
                $loginfo['style'] = 3;
                $loginfo['table'] = 'admin';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = input('post.id');
                $loginfo['note'] = '更新管理员信息';
                $every->logger($loginfo);
            }
			return $rel;
		}
		$this->assign(array(
			'info' => model('Admin')->get(input('get.id')),
			'ro_list' => db('role')->select(),
		));
		return $this->fetch();
	}

	//角色
	public function roleIndex() {
	    $every = new Every;
		if (is_post()) {
			$data = input('post.');
			//var_dump($data);exit();
			if(empty($data['ro_name'])){
				$this->error('请填写角色名');
			}
			if(empty($data['rules'])){
				$this->error('请选择权限');
			}
			sort($data['rules']);
			$data['ro_rules'] = implode(',', array_unique($data['rules']));
			unset($data['rules']);
//            $loginfo['style'] = 3;
            $loginfo['table'] = 'role';
            $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
//            $loginfo['user_id'] = input('post.id');
//            $loginfo['note'] = '更新管理员信息';

			if ($data['id']) {
				$rst = db('Role')->update($data);
                $loginfo['user_id'] = $data['id'];
                $loginfo['note'] = '更新角色信息';
                $loginfo['style'] = 3;
			} else {
				$rst = db('Role')->insertGetId($data);
                $loginfo['user_id'] = $rst;
                $loginfo['note'] = '添加角色信息';
                $loginfo['style'] = 2;
			}
			if ($rst) {
                $every->logger($loginfo);
				$this->success('操作完成');
			}
			$this->error('您并没有作出修改');
		} else {
			$this->assign('list', db('role')->select());
			return $this->fetch();
		}
}
	// 添加角色
	public function roleAdd() {
		$list = db('rule')->where('pid', 0)->select();
		foreach ($list as $k => $v) {
			$list[$k]['child'] = db('rule')->where('pid', $v['id'])->select();
		}
		$this->assign('ru_list', $list);
		if (input('get.id')) {
			$this->assign('info', db('role')->where('id', input('get.id'))->find());
		} 
		/*else {
			$this->assign('info', ['ro_rules' => '1,2,3,4']);
		}*/
		return $this->fetch();
	}
	//逻辑删除管理员
	public function deleteAdmin(){
	    $every = new Every;
		if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->error('id不存在');
        }
        if (input('post.key')) {
            $key = input('post.key');
        } else {
            $this->error('数据表不存在');
        }
        $info = model($key)->get($id);
        $data['delete_status'] = 0;
        $where['id'] = $id;
        if ($info) {
            $rel = model($key)->where($where)->update($data);
            if ($rel) {
                $loginfo['style'] = 4;
                $loginfo['table'] = 'admin';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $id;
                $loginfo['note'] = '删除管理员';
                $every->logger($loginfo);
                $this->success('删除成功');
            } else {
                $this->error('请联系网站管理员');
            }
        } else {
            $this->error('数据不存在');
        }
	}

}
