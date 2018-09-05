<?php
namespace app\interceptors;
use rap\web\interceptor\Interceptor;
use rap\web\Request;
use rap\web\Response;

/**
 * User: jinghao@duohuo.net
 * Date: 18/9/4
 * Time: 下午5:51
 * Link:  http://magapp.cc
 * Copyright:南京灵衍信息科技有限公司
 */
class RapInterceptors  implements Interceptor  {
    public function handler(Request $request, Response $response) {
        if($request->path()=='/rap_intercepters'){
            $response->setContent('第一个拦截器');
            $response->send();
            return;
        }
    }


}