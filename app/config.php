<?php
return [
    'app'=>[
        'name'=>'test_app',//应用唯一辨识名称,分布式下回有用
        'debug'=>true,       //debug模式
        'debug_secret'=>'123456',//debug调试密钥
        'init'=>\app\AppInit::class, //初始化类
    ],
    'swoole_http'=>[                //swoole_http服务器
        'ip'=>'0.0.0.0',  //默认
        'port'=>9501,   //端口
        'document_root'=>ROOT_PATH,  //静态文件根目录
        'enable_static_handler'=>false,     //开启静态文件
        'worker_num'=>1,        //woker 进程数
        'task_worker_num'=>0,   //异步任务进程数
        'task_max_request'=>0,   //woker进程最大访问次数
        'coroutine'=>true              //使用协程进行异步编程
    ],
    'interceptors'=>[
        \app\interceptors\RapInterceptors::class//这是测试拦截器,里面是测试代码
    ],
    'interceptors_except'=>['/log'],//拦截器排除路径前缀
    'mapping'=>[
        '/log'=>\rap\log\controller\LogController::class, //不想使用可以移除
        "/home"=>\app\api\controller\HomeController::class
    ],
    'view'=>[ //模板引擎
        'type'=>'twig',
        'template_base'=>'template',
        'postfix'=>'html',
    ],
   "db"=>[   //配置数据库
       'type'=>'mysql',
       'dsn'=>"mysql:dbname=rapphp;host=127.0.0.1;charset=utf8",
       'username'=>"root",
       'password'=>"root",
         'pool'=>['min'=>1,
                  'max'=>10,
                  'check'=>30,
                  'idle'=>30
         ],
   ],
   'storage'=>[    //配置文件存储
       'type'=>'oss',//本地为 local
       'accessKeyId' => "",
       'accessKeySecret' => "",
       'endpoint' => "http://oss-cn-shanghai.aliyuncs.com",
       'bucket'=>'',
       'cname'=>'http://cdn.oss.magapp.cc/',
       'webp'=>false,
       'watermark'=>''
   ],
    'cache'=>[ //配置缓存
         'type'=>'redis',//文件缓存为file
         'host'       => '127.0.0.1',
         'port'       => 6379,
         'password'   => '',
         'select'     => 0,
         'timeout'    => 0,
         'expire'     => -1,
         'persistent' => false,
           'pool'=>['min'=>1,
                    'max'=>10,
                    'check'=>30,
                    'idle'=>30
           ],
     ],
    'config'=>[//数据库中配置项
        "table"=>"config",
        "module_field"=>"module",
        "content_field"=>"content",
    ],
//    'rpc_service'=>[        //RPC服务方配置
//        'token'=>'123',
//    ],
//    'rpc'=>[  //RPC客户端配置
//              'cloud'=>[
//                        'register'=>\test\rpc\RPcTestRegister::class,
//                        'host' => 'cloud',
//                        'port'=>80,
//                        'token' => '123',
//                        'timeout'=>5,
//                        'fuse_time'=>30,//熔断器熔断后多久进入半开状态
//                        'fuse_fail_count'=>20,//连续失败多少次开启熔断
//                        'pool'=>['min'=>1,
//                                 'max'=>10,
//                                 'check'=>30,
//                                 'idle'=>30
//                        ],
//              ]
//    ],

    'log'=>[ //log 类型
        'type'=>'file'
    ],
    'cmds'=>[//自定义命令行

    ]

];