<?php
    $sqluser = 'cvphp';
    $sqlpswd = 'password1';
    $dsn = 'mysql:host=cv_mysql;dbname=cv';

    $email=trim($_REQUEST['email']);
    $password=trim($_REQUEST['password']);
    $password2=trim($_REQUEST['password2']);
    $password= password_hash($password, PASSWORD_DEFAULT);
    $password2= password_hash($password2, PASSWORD_DEFAULT);
    date_default_timezone_set('Asia/Shanghai');

    if(!filter_var( $email, FILTER_VALIDATE_EMAIL)){
        echo '<script language="JavaScript">;alert("邮箱地址错误");
        location.href="user_reg.php";
        </script>;';
    }
    if ($password!=$password2) {
        echo '<script language="JavaScript">;alert("重复密码不一致");
        location.href="user_reg.php";
        </script>;';
    }
    if (strlen($password)<6) {
        echo '<script language="JavaScript">;alert("密码长度少于6位");
        location.href="user_reg.php";
        </script>;';
    }

    try {
        $dbh = new PDO( $dsn, $sqluser, $sqlpswd );

    } catch (PDOException $e) {
        print "error:" . $e->getMessage() . "<br/>";
        echo '<script language="JavaScript">;alert("数据库连接错误联系开发人员");
        location.href="user_reg.php";
        </script>;';
        die();
    }
    try {
        // $dbh->beginTransaction();
        // $email = mysqli_real_escape_string($dbh, $email);
        // $password = mysqli_real_escape_string($dbh, $password);
        $datetime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `user` ( `email`, `password`, `creatDate`) VALUES ( ?, ?, ? ) ";
        $stm = $dbh->prepare($sql);
        $stm->bindValue(1,$email,pdo::PARAM_STR);
        $stm->bindValue(2,$password,pdo::PARAM_STR);
        $stm->bindValue(3,$datetime,pdo::PARAM_STR);
        $stm->execute();
        echo '<script language="JavaScript">;alert("注册成功");
        location.href="index.php";
        </script>;';
        die();
    } catch (PDOException $e) {
        print "error:" . $e->getMessage() . "<br/>";
        echo '<script language="JavaScript">;alert("数据库写入错误联系开发人员");
        location.href="user_reg.php";
        </script>;';
        // $dbh->rollBack();
        die();
    }
    finally{
        $dbh = null;
    }

?>
