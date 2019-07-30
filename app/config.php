<?php
return ['app' => ['name' => 'test-app',//应用唯一辨识名称,分布式下回有用
                  'debug' => true,       //debug模式
                  'url_base' => 'url_base',//路劲前缀会被去掉再匹配
                  'init' => \app\AppInit::class,//初始化类
],
        //swoole_http服务器
        'swoole_http' => ['ip' => '0.0.0.0',//默认
                          'port' => 9501, //端口
                          'document_root' => ROOT_PATH,//静态文件根目录
                          'static_handler_locations' => ['admin', 'static', 'mobile'],//静态文件目录
                          'enable_static_handler' => true, //开启静态文件
                          'worker_num' => 1,//woker 进程数
                          'http2' => false,  //开启http2
                          'auto_reload_dir' => ['app'], //开发时修改代码后自动重启worker进程 需要监听的目录
                          'auto_reload' => $_SERVER[ 'SERVER_AUTO_LOAD' ],//开发时修改代码后自动重启worker进程   只有 app.debug=true 才有效
        ],
        //拦截器
        'interceptors' => [\app\interceptors\RapInterceptors::class],
        //拦截器排除路径前缀
        'interceptors_except' => ['/log'],
        //匹配
        'mapping' => [],
        //模板引擎
        'view' => ['type' => 'twig',//引擎类型 目前twig比较符合swoole规范的,请勿使用smarty问题大
                   'template_base' => 'template', //模板引擎的存放路径
                   'postfix' => 'html',//后缀
        ],
        //数据库配置
        "db" => ['type' => 'mysql',
                 'dsn' => "mysql:dbname=rapphp;host=127.0.0.1;charset=utf8",
                 'username' => "root",
                 'password' => "root",
                 //连接池
                 'pool' => ['min' => 1,//最小连接数
                            'max' => 10,//最大连接数
                            'check' => 30,//检查时间 单位s
                            'idle' => 30//存活时间  单位s
                 ]],
        //文件存储
        'storage' => ['type' => 'oss',//本地为 local
                      'accessKeyId' => "",
                      'accessKeySecret' => "",
                      'endpoint' => "http://oss-cn-shanghai.aliyuncs.com",
                      'bucket' => '',
                      'cname' => 'http://cdn.oss.magapp.cc/',
                      'webp' => false,
                      'watermark' => ''],
        //配置 session 模式 不配置
        'session' => ['type' => 'redis',//文件缓存为file
                    'host' => '47.97.238.235',
                    'port' => 6379,
                    'password' => 'minsutest',
                    'select' => 0,
                    'timeout' => 0,
                    'expire' => -1,
                    'persistent' => false,
                    //连接池
                    'pool' => ['min' => 1,
                               'max' => 10,
                               'check' => 30,
                               'idle' => 30],],
        //缓存
        'cache' => ['type' => 'redis',//文件缓存为file
                    'host' => '47.97.238.235',
                    'port' => 6379,
                    'password' => 'minsutest',
                    'select' => 0,
                    'timeout' => 0,
                    'expire' => -1,
                    'persistent' => false,
                    //连接池
                    'pool' => ['min' => 1,
                               'max' => 10,
                               'check' => 30,
                               'idle' => 30],],
        //来自数据库中的配置
        'config' => ["table" => "config",//表
                     "module_field" => "module",//模块字段
                     "content_field" => "content",//内容字段
        ],
        //
        //    'rpc_service'=>[        //RPC服务方配置
        //       'open' => true
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
        //日志 默认会按天切割 格式为 JSON
        'log' => ['max' => 10,//最大保存天数
                  'level' => 'debug'],
        //自定义命令行
        'cmds' => []

];