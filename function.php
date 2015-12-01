<?php

/**
 * youtubeのURLから埋め込みタグを生成する
 *
 * @param   string $param youtubeのURL
 * @return  string        埋め込みタグ
 */
function createvideotag($param)
{
    //とりあえずURLがyoutubeのURLであるかをチェック
    if(preg_match('#https?://www.youtube.com/.*#i',$param,$matches)){
        //parse_urlでhttps://www.youtube.com/watch以下のパラメータを取得
        $parse_url = parse_url($param);
        // 動画IDを取得
        if (preg_match('#v=([-\w]{11})#i', $parse_url['query'], $v_matches)) {
            $video_id = $v_matches[1];
        } else {
            // 万が一動画のIDの存在しないURLだった場合は埋め込みコードを生成しない。
            return false;
        }
        $v_param = '';
        // パラメータにt=XXmXXsがあった時の埋め込みコード用パラメータ設定
        // t=〜〜の部分を抽出する正規表現は記述を誤るとlist=〜〜の部分を抽出してしまうので注意
        if (preg_match('#t=([0-9ms]+)#i', $parse_url['query'], $t_maches)) {
            $time = 0;
            if (preg_match('#(\d+)m#i', $t_maches[1], $minute)) {
                // iframeでは正の整数のみ有効なのでt=XXmXXsとなっている場合は整形する必要がある。
                $time = $minute[1]*60;
            }
            if (preg_match('#(\d+)s#i', $t_maches[1], $second)) {
                $time = $time+$second[1];
            }
            if (!preg_match('#(\d+)m#i', $t_maches[1]) && !preg_match('#(\d+)s#i', $t_maches[1])) {
                // t=(整数)の場合はそのままの値をセット ※秒数になる
                $time = $t_maches[1];
            }
            $v_param .= '?start=' . $time;
        }
        // パラメータにlist=XXXXがあった時の埋め込みコード用パラメータ設定
        if (preg_match('#list=([-\w]+)#i', $parse_url['query'], $l_maches)) {
            if (!empty($v_param)) {
                // $v_paramが既にセットされていたらそれに続ける
                $v_param .= '&list=' . $l_maches[1];
            } else {
                // $v_paramが既にセットされていなかったら先頭のパラメータとしてセット
                $v_param .= '?list=' . $l_maches[1];
            }
        }
        // 埋め込みコードを返す
        return '<iframe width="600" height="338" src="https://www.youtube.com/embed/' . $video_id . $v_param . '" frameborder="0" allowfullscreen></iframe>';
    }
    // パラメータが不正(youtubeのURLではない)ときは埋め込みコードを生成しない。
    return false;
}

function get_subtitle($param){

  //とりあえずURLがyoutubeのURLであるかをチェック
  if(preg_match('#https?://www.youtube.com/.*#i',$param,$matches)){
      //parse_urlでhttps://www.youtube.com/watch以下のパラメータを取得
      $parse_url = parse_url($param);
      // 動画IDを取得
      if (preg_match('#v=([-\w]{11})#i', $parse_url['query'], $v_matches)) {
          $video_id = $v_matches[1];
      } else {
          // 万が一動画のIDの存在しないURLだった場合は埋め込みコードを生成しない。
          return false;
      }
      // 動画の字幕を取得するためのURLを生成
      $video_sub_url = "http://video.google.com/timedtext?"."lang=en&v=".$video_id;

      //return $video_sub_url;

      //simplehtml読み込み
      require_once('simple_html_dom.php');

      //　動画字幕を取得しに行く
      $fp = fopen($video_sub_url, "r");
      if (!is_resource($fp)) {
        die("can't open file");
      }
      else{
        //echo("open file");
      }
      $file = file_get_contents($video_sub_url);
      //字幕ファイルの中から本文だけ摘出
      preg_match_all("!\>(.*?)\<\/text!s",$file,$match);
      $text_array = $match[0];
      //$subtext_print = $match[0];
      //return $subtext_print;
      //var_dump(current(array_slice($text_array, $n, 1, true)));
/*
      for($i = 0; $i < count($text_array); $i++){
        echo $text_array[$i] . "<br>\n";
      }
*/
      $value_matome = "";

      foreach($text_array as $value){
        $value_matome .= $value;
        $value_matome .= "<br><br>";
        //echo  $value;
        //echo "<br><br>";
      }
      return $value_matome;
    }

}

function listCaptions(Google_Service_YouTube $youtube, $videoId, &$htmlBody) {
  // Call the YouTube Data API's captions.list method to retrieve video caption tracks.
  $captions = $youtube->captions->listCaptions("snippet", $videoId);

  $htmlBody .= "<h3>Video Caption Tracks</h3><ul>";
  foreach ($captions as $caption) {
    $htmlBody .= sprintf('<li>%s(%s) in %s language</li>', $caption['snippet']['name'],
        $caption['id'],  $caption['snippet']['language']);
  }
  $htmlBody .= '</ul>';

  return $captions;
}


function save_text($user_text){

}

?>
