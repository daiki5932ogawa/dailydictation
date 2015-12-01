<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

		<link rel="stylesheet" type="text/css" href="style.css" media="all">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>


  </head>
    <!-- ヘッダー読み込み -->
  <?php include 'header.php'; ?>
	<!-- ボディー -->
	<body>
		<!-- ログイン完了画面 -->
    <?php
    $conn=mysqli_connect('localhost:3306','root','root') or exit("MySQLへ接続できません。");
    mysqli_select_db($conn,'dailydictation') or exit("データベース名が間違っています。");
    $sql="SELECT * FROM userinfo where username='{$_POST['input_user']}' and password='{$_POST['input_pass']}';";
    $result=mysqli_query($conn,$sql) or exit("データの抽出に失敗しました。");

    //mysqli_num_rows($MySQL['result'])は、SELECT文で抽出されたレコードの数を返す関数です。
    //抽出されたレコード数が０の場合は、ユーザ名とパスワードが一致しなかったことになります。
    //抽出されたレコード数が一つ以上あれば、ユーザ名とパスワードが一致したことになります。
    //コード数が２以上存在するということは、同じユーザ名とパスワードを持つユーザが２名以上
    //存在することになります。
    //このような登録ができないように次のユーザ登録のところで行います。

      if(mysqli_num_rows($result)!=0){
        echo "ログイン完了<br>";
        $view_username = $input_user;
        echo "a $view_username a";
      }
      else{
        echo "ログイン失敗<br>ユーザー名かパスワードが間違っています";
      }
      mysqli_close($conn);

    ?>

    <!-- データの照合を行う -->


	</body>
  <!-- フッター読み込み -->
  <?php include 'footer.php'; ?>
</html>
