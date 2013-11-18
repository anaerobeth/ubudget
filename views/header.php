<!DOCTYPE html>
<html>
  <head>
    <title><?php echo APP_NAME; ?></title>
    
    <meta name="description" content="">
    <meta name="author" content="<?php echo APP_AUTHOR; ?>">
    
    <!-- Bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo ASSET_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ASSET_URL; ?>css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo ASSET_URL; ?>css/theme.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo ASSET_URL; ?>ico/favicon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- Google Charts -->
    <?php if (isset($pie)) :?>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
              var data = google.visualization.arrayToDataTable(<?php echo $pie; ?>);

            var options = {
              title: 'Budget Allocation By Sector'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
          }
        </script>
    <?php endif; ?>
    
    <!-- Share This -->
    <meta property="og:title" content="<?php _e(APP_NAME); ?>" />
    <meta property="og:type" content="Sharing Widgets" />
    <meta property="og:url" content="<?php _e(BASE_URL .'survey/new'); ?>" />
    <meta property="og:image" content="<?php _e(ASSET_URL .'images/144.png'); ?>" />
    <meta property="og:description" content="Time to let our policy makers know what we think is important to us!" />
    <meta property="og:site_name" content="<?php _e(APP_NAME); ?>" />
    
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "<?php _e(SHARETHIS_PUBID); ?>", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    
    <script type="text/javascript">
    function updateTextInput(val, id) {
      document.getElementById(id).value=val; 
    }
  </script>
    
  </head>
  <body>
      
      
      
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php _e(BASE_URL); ?>"><?php _e(APP_NAME); ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php _e(BASE_URL); ?>">Home</a></li>
            <li><a href="<?php _e(BASE_URL .'survey/new'); ?>">Submit Your Budget</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase">