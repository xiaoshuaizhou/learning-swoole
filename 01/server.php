<?php

// 创建服务端 server 对象
// 默认使用 tcp 协议
$server = new Swoole\Server('127.0.0.1', '9501');

$server->set([
    'worker_num' => 2, // 设置进程数
]);

// 监听连接事件
$server->on('connect', function ($server, $fd){
    echo "新的连接进入" . $fd . PHP_EOL;
});

// 监听消息事件
$server->on('receive', function (swoole_server $server, int $fd, int $reactor_id, string $data){
    echo "新的消息进来了" . $fd . PHP_EOL;
    // 会发送到 客户端 的 recv 方法
    $server->send($fd, "我是服务端");
});

// 关闭事件
$server->on('close', function () {
    echo "新的连接关闭" . PHP_EOL;
});

// 服务器开启状态
$server->start();