<?php
/**
 *路由
 * @author sunpf
 * @date 2020/4/22 17:28
 */
use think\Route;
//Route::rule('bidding/:id','index/bidding/addbid','post');
//Route::alias('user','\app\index\controller\User');
return [
    '__alias__' =>  [
        'user'  =>  'index/User',
        'bidding' =>'index/bidding',
    ],
];