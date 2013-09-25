<?php

require_once 'twitteroauth/twitteroauth.php';
define('CONSUMER_KEY', '4NTNxYcAuS55LmCbYyn9kA');
define('CONSUMER_SECRET', 'lVtnrMzISrYQUscso7Bj7tAHTFdPJhXeFSSM5VbY');
define('ACCESS_TOKEN', '1902417254-gFvcMRaKYZwiSRdJmBw3Z7UW93apsH1xKYPQHXF');
define('ACCESS_TOKEN_SECRET', 'VazQFA43bJ1ZN0vUsN9YCp57mjYx7EYaFxqTPNgM');
$twobj = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$options = array ('count' => 10);

$twobj_req = $twobj->OAuthRequest('https://api.twitter.com/1.1/statuses/home_timeline.json', 'GET', $options);

$twobj_req_json = json_decode($twobj_req, true);

$tl = '';

foreach ($twobj_req_json as $key => $value) {
	$name = $value['user']['name'];
	$scname = $value['user']['screen_name'];
	$text = $value['text'];
	$iconurl = $value['user']['profile_image_url'];
	
	$tl .= 	"
	<article class='tweet'>
		<header>{$name} <a href='http://twitter.com/{$scname}' class='scname'>@{$scname}</a></header>
		<div class='twcontent'>
        <div class='icon'><img src='{$iconurl}' width='40' height='40'></div>
		<p>{$text}</p>
		</div>
	</article>
	";
}


?>

<!DOCTYPE HTML>
<html lang="ja-JP">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Twitter API TEST</title>
<link rel="stylesheet" href="kadai1.css" type="text/css">
</head>
<body>
<div id="wrapper">
  <header id="top">
    <h1>Twitter</h1>
  </header>
  <?php
print($tl);
?>
</div>
</body>
</html>