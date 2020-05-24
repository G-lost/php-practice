<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登录</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<div class="container">
    <h1>用户登录</h1>
    <form action="user_save.php" method="post">
        <p><input type="email" name="email" placeholder="e-mail"></p>
        <p><input type="password" name="password" placeholder="password"></p>
        <p><input type="submit" value="登录"></p>
    </form>
</div>

    
</body>
</html>