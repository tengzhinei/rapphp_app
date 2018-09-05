<?php
return [
    'app'=>[
        'debug'=>true,              //debug 模式
        'debug_secret'=>'rapphp',//请及时更换默认密钥或上线时停止使用log
        'init'=>\app\AppInit::class,//入口类
    ],
    'swoole_http'=>[                //swoole_http服务器
        'ip'=>'0.0.0.0',
        'port'=>9501,
        'document_root'=>ROOT_PATH,
        'enable_static_handler'=>false,
        'worker_num'=>20,
        'task_worker_num'=>1,
        'task_max_request'=>0
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
       'password'=>"root"
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
         'persistent' => false
     ],
    'config'=>[//数据库中配置项
        "table"=>"config",
        "module_field"=>"module",
        "content_field"=>"content",
    ],
    'log'=>[ //log 类型
        'type'=>'file'
    ],
    'cmds'=>[//自定义命令行

    ]

];