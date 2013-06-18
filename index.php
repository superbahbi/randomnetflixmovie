<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Random netflix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons
    <link rel="shortcut icon" href="./assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
	 -->
  </head>

  
<?php 
	include './src/api.php';
 
	$api = new api();
	
	$subreddit = 'bestofnetflix';
	$limit = 50;
	$api->url = 'http://www.reddit.com/r/'.$subreddit.'.json?limit='.$limit;
	try {
	$data = $api->get_api_data();
	} catch (Exception  $e ) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	$link = array();
	foreach ($data->data->children as $netflix) {
		foreach ($netflix as $info) {
			$temp = clean_url($info->url);
			if (!$temp){
				continue;
			}
			array_push($link, $temp);
		}
	}
	$rand = rand(0, count($link) - 1 );
?>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand">Random Netflix</a>
          <a class="brand" href="http://reddit.com/r/bestofnetflix">/r/bestofnetflix</a>
          <div class="nav-collapse collapse">

            <!--
			<form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
			-->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="offset5">
		<p><a href="<?php echo $link[$rand] ?>" class="btn btn-inverse btn-large ">Random &raquo;</a></p>
      </div>
	  
	  <!--
	  <footer class="offset5">
			<p>&copy; bahbi</p>
	  </footer>
	  -->
      <hr>
      <hr>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap-transition.js"></script>
    <script src="./assets/js/bootstrap-alert.js"></script>
    <script src="./assets/js/bootstrap-modal.js"></script>
    <script src="./assets/js/bootstrap-dropdown.js"></script>
    <script src="./assets/js/bootstrap-scrollspy.js"></script>
    <script src="./assets/js/bootstrap-tab.js"></script>
    <script src="./assets/js/bootstrap-tooltip.js"></script>
    <script src="./assets/js/bootstrap-popover.js"></script>
    <script src="./assets/js/bootstrap-button.js"></script>
    <script src="./assets/js/bootstrap-collapse.js"></script>
    <script src="./assets/js/bootstrap-carousel.js"></script>
    <script src="./assets/js/bootstrap-typeahead.js"></script>
	

  </body>
</html>
