<?php
namespace app;
use app\api\controller\HomeController;
use rap\Init;
use rap\web\mvc\AutoFindHandlerMapping;
use rap\web\mvc\Router;

/**
 * User: jinghao@duohuo.net
 * Date: 18/8/31
 * Time: 下午4:39
 * Link:  http://magapp.cc
 * Copyright:南京灵衍信息科技有限公司
 */
class AppInit  implements Init {


    public function appInit(AutoFindHandlerMapping $autoMapping, Router $router) {
        //入口方法
        $router->index(HomeController::class,'index');

    }

}