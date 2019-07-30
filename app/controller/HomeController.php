<?php
namespace app\controller;

use app\service\CommonService;
use rap\web\Response;


class HomeController {

    /**
     * @var CommonService
     */
    private $commonService;

    /**
     * HomeController _initialize.
     *
     * @param CommonService $commonService service 请注入进来请勿直接new
     */
    public function _initialize(CommonService $commonService) {
        $this->commonService = $commonService;
    }

    /**
     * 首页
     *
     * @param Response $response
     *
     * @return string
     */
    public function index(Response $response) {
        $welcome = $this->commonService->welcome();
        $response->assign('welcome', $welcome);
        return '/index';
    }

    /**
     * @return array
     */
    public function json() {
        return ['success' => true, 'msg' => '这是你访问的第一个接口'];
    }



}