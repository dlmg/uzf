<?php
namespace app\admin\controller;

use Cache;


/**
 * @todo 配置信息管理
 */
class Setting extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }
    // --- ---------------------------------------------------------------------
    public function index()
    {
        if (is_post()) {
            $data = input('post.');
            model('Config')->xiugai($data);
            $this->success('修改成功');
        }
        return $this->fetch();
    }
    public function award()
    {
        if (is_post()) {
            $data = input('post.');
            model('Config')->xiugai($data);
            $this->success('修改成功');
        }
        return $this->fetch();
    }

    public function label()
    {
        if (is_post()) {
            $data = input('post.');
            $datb = $data;
            $datc = array_pop($data);
            if ($datc['name'] == "") {
                $datd = $data;
            } else {
                $datd = $datb;
            }
            $datd = serialize($datd);
            $rel = model("Config")->where('key', 'label')->update(['value' => $datd]);
            Cache::clear();
            if ($rel) {
                $this->success('修改成功');
            } else {
                $this->error('您并没有做出修改');
            }
        }
        $label = cache('setting')['label'];
        $array = [
            'name' => "",
            'pic' => "",
        ];
        $list = unserialize(cache('setting')['label']);
        array_push($list, $array);
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }

    public function shuffling()
    {
        if (is_post()) {
            $data = input('post.');
            $datb = $data;
            $datc = array_pop($data);
            // dump($data);
            // dump($datb);
            // halt($datc);
            if ($datc == "") {
                $datd = $data;
            } else {
                $datd = $datb;
            }
            $datd = implode(',', $datd);
            $rel = model("Config")->where('key', 'shuffling_figure')->update(['value' => $datd]);
            Cache::clear();
            if ($rel) {
                $this->success('修改成功');
            } else {
                $this->error('您并没有做出修改');
            }
        }
        $shuffling = cache('setting')['shuffling_figure'];
        $array = explode(',', $shuffling);
        array_push($array, '');
        $this->assign(array(
            'array' => $array,
        ));
        return $this->fetch();
    }

    //项目文档
    public function api()
    {
        return $this->fetch();
    }
    public function document()
    {
        $path = env('ROUTE_PATH');
        $swagger = \Swagger\scan($path);
        header('Content-Type: application/json');
        echo $swagger;
    }
    public function log()
    {

        if (input('get.keywords')) {
            $this->map[] = ['role_name', 'like', '%'.input('get.keywords').'%'];
        }
        if (is_numeric(input('get.style'))) {
            $this->map[] = ['style', '=', input('get.style')];
        }
        if (is_numeric(input('get.gave_status'))) {
            $this->map[] = ['gave_status', '=', input('get.gave_status')];
        }
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['add_time', '<=', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        $list = model('log')->getList($this->map, $this->order, $this->size);
//        halt($list);

        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();

    }
}
