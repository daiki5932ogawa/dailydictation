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
		<!-- 登録画面 -->
    <form action="page_finish_register.php" method="post">
      UserName: <input type="text" name="username" />
      Password: <input type="text" name="password" />
      E-Mail: <input type="text" name="email" />
      <input type="submit" class="btn btn-default btn-xs" name="submit" value="登録">
    </form>
	</body>
  <!-- フッター読み込み -->
  <?php include 'footer.php'; ?>
</html>