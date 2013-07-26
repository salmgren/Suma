<?php

require_once '../../lib/php/ServerIO.php';

try
{
    $io = new ServerIO();
    $initiatives = $io->getInitiatives();
}
catch (Exception $e)
{
    echo $e->getMessage();
    die;
}

$initDropDown = '<select name="id" id="initiatives">';
$initDropDown .= '<option value="' . 'default' . '">' . 'Select an Initiative' . '</option>' . "\n";
foreach($initiatives as $init)
{
    $initDropDown .= '<option value="' . $init['id'] . '">' . $init['title'] . '</option>' . "\n";
}

$initDropDown .= '</select>';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="../../lib/css/bootstrap.css" rel="stylesheet">
        <link href="../../lib/css/datepicker.css" rel="stylesheet">
        <link href="../../lib/css/colorbrewer.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet"  />
        <style>
          body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
          }
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href=".."><img src="../../lib/img/logo.png"></a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><a href="..">Home</a></li>
                            <li><a href="../about.html">About</a></li>
                            <li><a href="../contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <form>
                <div class="control-group">
                    <h5 class="suma-popover" rel="popover" data-trigger="hover" data-delay="300" data-title="Choose Initiative" data-content="Choose an initiative to reveal additional filters.">Choose Initiative</h5>
                        <label class="control-label" for="initiatives"></label>
                        <div class="controls">
                            <?php echo $initDropDown; ?>
                        </div>
                </div>
                <div>
                    <input type="submit" id="submit" class="btn btn-success" data-default-text ="Submit" data-loading-text="Loading..." value="Submit" />
                </div>
            </form>
            <div id="chart">
                <div id="loading"><img src="../../lib/img/spinner.gif"></div>
            </div>
            <div id="legend">
                <span>Less</span>
                <ul class="legend-list">
                    <li style="background-color: #eee"></li>
                    <li style="background-color: #d6e685"></li>
                    <li style="background-color: #8cc665"></li>
                    <li style="background-color: #44a340"></li>
                    <li style="background-color: #1e6823"></li>
                </ul>
                <span>More</span>
            </div>
        </div>

        <script src="../../lib/js/jquery.min.js"></script>
        <script src="../../lib/js/bootstrap.min.js"></script>
        <script src="../../lib/js/bootstrap-datepicker.js"></script>
        <script src="../../lib/js/d3.v3.min.js"></script>
        <script src="../../lib/js/lodash.min.js"></script>
        <script src="../../lib/js/moment.js"></script>
        <script src="js/calendar.js"></script>

    </body>
</html>