<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<?php
    $redis = new Redis();
    $redis->connect('cv_redis');
    echo "Connection to server successfully</br>";
   //设置 redis 字符串数据
   $redis->set("testkey", "test value");
   // 获取存储的数据并输出
   echo "Stored string in redis:: " . $redis->get("testkey");
?>