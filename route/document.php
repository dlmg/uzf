<?php
/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   host="192.168.2.181:1235",
 *   consumes={"multipart/form-data"},
 *   produces={"application/json"},
 *   @SWG\Info(
 *     version="2.3",
 *     title="宜享购",
 *     description="接口文档 参考<br>"
 *   ),
 *   @SWG\Tag(
 *     name="Store",
 *     description="商城",
 *   ),
 *	 @SWG\Tag(
 *     name="Login",
 *     description="登陆",
 *   ),
 *   @SWG\Tag(
 *     name="User",
 *     description="用户",
 *   ),
 *
 *   @SWG\Tag(
 *     name="EveryLogic",
 *     description="公共",
 *   ),

 *   @SWG\Tag(
 *     name="Order",
 *     description="订单",
 *   ),
 * )
 */

/**
 * @SWG\Get(
 *   path="/user/detail",
 *   tags={"User"},
 *   summary="用户详情 传入id 则表示某个人的详情",
 *   @SWG\Parameter(name="id", type="string",  in="query",description="输入id 则为查寻的该id人的详情"),
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/user/direct",
 *   tags={"User"},
 *   summary="用户下级 传入id 则表示某个人的下级",
 *   @SWG\Parameter(name="id", type="string",  in="query",description="输入id 则为查寻的该id人的详情"),
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/store/label",
 *   tags={"Store"},
 *   summary="标签分类列表",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/store/shuffling",
 *   tags={"Store"},
 *   summary="轮播图列表",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/store/index",
 *   tags={"Store"},
 *   summary="门店列表",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/store/product",
 *   tags={"Store"},
 *   summary="分类产品列表",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/store/detail",
 *   tags={"Store"},
 *   summary="产品详情",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Get(
 *   path="/login/login",
 *   tags={"Login"},
 *   summary="会员登陆",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
/**
 * @SWG\Post(
 *   path="/login/Register",
 *   tags={"Login"},
 *   summary="会员注册",
 *   @SWG\Response(
 *     response=200,
 *     description="成功"
 *   ),
 * )
 */
