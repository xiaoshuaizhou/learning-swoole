<?php

// 创建一个客户端「协议，类型(同步，异步)」
$client = new Swoole\Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_SYNC);
// 连接事件
$client->connect('127.0.0.1', "9501") || exit('连接失败！');

// 发送消息事件
$client->send('我是客户端');

// 接受服务端 send  发送的数据
echo $client->recv();

// 关闭事件,发完消息不能马上关闭，无论 tcp udp
$client->close();

