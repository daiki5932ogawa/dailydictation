<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VideoPage1</title>

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
		<!-- 左側の動画エリア -->
		<div id="video_area" class="col-sm-6">
			<!-- URLフォーム -->
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				動画のURL：<input class="searchbar" type="text" name="movie_url">
				<input type="submit" class="btn btn-default btn-xs" name="submit" value="開く">
			</form>
			<br>
			<!-- フォームからURLを取得し、動画を表示 -->
			<?php
				$param = $_POST["movie_url"]
			?>
      <?php
        $videoId = $_POST["movie_url2"]
      ?>
			<?php
	  		include "function.php";
			?>
      <div><?php echo listCaptions($videoId) ?></div>
			<div><?php echo createvideotag($param) ?></div>
      <div><?php get_subtitle($param) ?></div>
		  <button type="button" class="btn btn-default btn-xs">字幕ビューに切り替え</button>
      <textarea name="example" cols="50" rows="10">
        <?php echo get_subtitle($param); ?>
      </textarea>
		</div>
		<!-- 右側のテキストエリア -->
		<div id="text_area" class="col-sm-6">
			<textarea class="dictation_area" cols="" rows=""></textarea>
			<button type="button" class="btn btn-default btn-xs">保存</button>
			<button type="button" class="btn btn-default btn-xs">登録</button>
		</div>
	</body>
  <!-- フッター読み込み -->
  <?php include 'footer.php'; ?>
</html>
