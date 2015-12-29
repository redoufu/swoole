<?php
$table = new swoole_table(1024);
$table->column('id', swoole_table::TYPE_INT, 4);       //1,2,4,8
$table->column('name', swoole_table::TYPE_STRING, 64);
$table->column('num', swoole_table::TYPE_FLOAT);
$table->create();

$worker = new swoole_process('child1', false, false);
$worker->start();
//
//child
function child1($worker)
{
    global $table;
    $s = microtime(true);
    $table->set('tianfenghan@qq.com', array('id' => 145, 'name' => 'rango', 'num' => 3.1415));
    $table->set('350749960@qq.com', array('id' => 358, 'name' => "Rango1234", 'num' => 3.1415));
    $table->set('hello@qq.com', array('id' => 189, 'name' => 'rango3', 'num' => 3.1415));
    $table->set('tianfenghan@qq.com', array('id' => 145, 'name' => 'rango', 'num' => 3.1415));
    $table->set('350749960@qq.com', array('id' => 358, 'name' => "Rango1234", 'num' => 3.1415));
    echo "set - 5 use: ".((microtime(true) - $s) * 1000)."ms\n";
    sleep(100000);
}

//master
sleep(1);

$s = microtime(true);
//for($i =0; $i < 1000; $i++)
//{
//    $arr = $table->get('350749960@qq.com');
//	var_dump($arr);
//}

//$table->incr('tianfenghan@qq.com', 'id', 5);
//$table->decr('hello@qq.com', 'num', 1.1);
$ret1 = $table->get('350749960@qq.com');
$ret2 = $table->get('tianfenghan@qq.com');
$ret1 = $table->get('350749960@qq.com');
$ret2 = $table->get('tianfenghan@qq.com');
$ret3 = $table->get('hello@qq.com');

echo "get -5 use: ".((microtime(true) - $s) * 1000)."ms\n";
//var_dump($ret1, $ret2, $ret3);

//var_dump($table->get('350749960@qq.com'));
sleep(100000);
