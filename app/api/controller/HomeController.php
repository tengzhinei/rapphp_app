<?php
namespace app\api\controller;

use app\api\service\TestService;
use rap\log\Log;
use rap\web\Response;

/**
 * User: jinghao@duohuo.net
 * Date: 18/9/4
 * Time: 下午5:24
 * Link:  http://magapp.cc
 * Copyright:南京灵衍信息科技有限公司
 */
class HomeController {
    /**
     * @var TestService
     */
    private $testService;

    /**
     * HomeController _initialize.
     *
     * @param TestService $testService
     */
    public function _initialize(TestService $testService) {
        $this->testService = $testService;
    }


    public function index(Response $response) {
        $welcome = $this->testService->welcome();
        $response->assign('welcome',$welcome);
        Log::debug("这是 debug 调试信息可以在控制台看到");
        return 'index';
    }


    public function json() {
        return ['success' => true, 'msg' => '这是你访问的第一个接口'];
    }



}