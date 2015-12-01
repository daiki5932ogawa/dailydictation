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
		<!-- 登録完了画面 -->
    <?php
    $con = mysql_connect('localhost:3306', 'root', 'root');
    if (!$con) {
      exit('データベースに接続できませんでした。');
    }

    $result = mysql_select_db('dailydictation', $con);
    if (!$result) {
      exit('データベースを選択できませんでした。');
    }

    $result = mysql_query('SET NAMES utf8', $con);
    if (!$result) {
      exit('文字コードを指定できませんでした。');
    }

    $username   = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email  = $_REQUEST['email'];

    $result = mysql_query("INSERT INTO userinfo(username, password, email) VALUES('$username', '$password', '$email')", $con);
    if (!$result) {
      exit('データを登録できませんでした。');
    }

    $con = mysql_close($con);
    if (!$con) {
      exit('データベースとの接続を閉じられませんでした。');
    }

    ?>

    <?php
    if(isset($_POST['username'])){
      $username = $_POST[‘username’];
      echo "登録が完了しました。<br>";
      echo "ユーザー名は";
      echo htmlspecialchars($_POST['username']);
      echo "です。";
      echo $_POST[‘user_name’];
    }
    else{
      echo "登録失敗";
    }
      ?>

      <a href="page_log_in.php">ログイン</a>
    </form>
	</body>
  <!-- フッター読み込み -->
  <?php include 'footer.php'; ?>
</html>
