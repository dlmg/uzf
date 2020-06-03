<?php
namespace app\common\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    protected $order;
    protected $size;
    protected $map;
    protected $request;
    public function initialize()
    {
        parent::initialize();
        if (!cache('setting')) {
            $setting = model('Config')->getInfo();
            cache('setting', $setting);
        }
        $this->order = 'id desc';
        $this->size = '10';
        $this->map = [];
        //$this->request = new Request;//windows 用，Linux注释掉
    }
    public function object_array($array)
    {
        if (is_object($array)) {
            $array = (array) $array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }

    protected function is_options()
    {
        return request()->isOptions();
    }
    protected function is_post()
    {
        return request()->isPost();
    }
    protected function is_get()
    {
        return request()->isGet();
    }
}
