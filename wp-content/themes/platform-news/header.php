<?php
	global $lang;
	$lang = '';
	if ( $_POST['ua'] || $_POST['ru'] || $_POST['en'] ) {
		if ( $_POST['ua'] ) {
			setcookie ( 'lang', 211, time() + 259200 ); //259200 - 3 days
			$lang = 211;
		}
		else if ( $_POST['ru'] ) {
			setcookie ( 'lang', 212, time() + 259200 );
			$lang = 212;
		}
		else if ( $_POST['en'] ) {
			setcookie ( lang, 213, time() + 259200 );
			$lang = 213;
		}
	}
	else {
		if ( $_COOKIE['lang'] ) {
			$lang = $_COOKIE['lang'];
		}
		else {
			setcookie ( 'lang', 211, time() + 259200 );
			$lang = 211;
		}
	}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Platform-News</title>
	<meta charset="utf-8">
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		/*mobile*/
		@media screen and (max-width: 767px) {
			.header-bg{
				height: 100%;
			}
			.container{
				width: 100%;
			}
			.advertisment{
				max-height: 300px;
			}
			.lang {
				top: auto;
				margin-top: -50px;
			}
			.menu-item{
				font-size: 17px;
				padding-left: 15px;
			}
			.menu-list{
				height: auto;
			}
			.header-sign-size{
				font-size: 20px;
				display: inline-block;
			}
			.header-sign-sec{
				margin-top: 0;
			}
			.header-sign-thrd{
				font-size: 17px;
			}
			.float-for-mob{
				text-align: center;
			}
		}
	</style>
</head>

<?php
	if ( $lang == 212 ) {
		get_template_part('lang/ru/navigation');
	}
	else if ( $lang == 213 ) {
		get_template_part('lang/en/navigation');
	}
	else {
		get_template_part('lang/ua/navigation');
	}
?>