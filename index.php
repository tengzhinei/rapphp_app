<?php
error_reporting(E_ALL& ~E_NOTICE& ~E_WARNING&~E_DEPRECATED);
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
define('IS_WIN', strpos(PHP_OS, 'WIN') !== false);
define('IS_SWOOLE', IS_CLI&&$argv[1]=='http'||$argv[1]=='websocket');
define('ROOT_PATH',__DIR__.DIRECTORY_SEPARATOR);
require __DIR__ . '/vendor/duohuo/rapphp/start.php';

