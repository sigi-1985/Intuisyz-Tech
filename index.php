<?php
include_once('config/db.php');
$query = "SELECT * FROM jobapplication";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Intuisyz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/pages/dashboard.css" rel="stylesheet">

  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand"
          href="index.php">INTUISYZ</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>
                Admin <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div>

    </div>

  </div>

  <div class="subnavbar">
    <div class="subnavbar-inner">
      <div class="container">
        <ul class="mainnav">
          <li class="active"><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
          <li class><a href="applications.php"><i class="icon-list-alt"></i><span>Applications</span> </a> </li>
          <li class><a href="add_vac.php"><i class="icon-list-alt"></i><span>Add Vacancy</span> </a> </li>
          <li><a href="list_enq.php"><i class="icon-facetime-video"></i><span>Enquiries</span> </a></li>
          <li><a href="exp-data.php"><i class="icon-file"></i><span>Export Data</span> </a></li>
        </ul>
      </div>

    </div>

  </div>

  <script type="text/javascript">
    window._mfq = window._mfq || [];
    (function () {
      var mf = document.createElement("script");
      mf.type = "text/javascript"; mf.defer = true;
      mf.src = "//cdn.mouseflow.com/projects/eec0f1fc-c67c-4e49-b980-3506992571cd.js";
      document.getElementsByTagName("head")[0].appendChild(mf);
    })();
  </script>
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span6">
            <div class="widget widget-nopad mino">
              <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Today's Stats</h3>
              </div>

              <div class="widget-content">
                <div class="widget big-stats-container">
                  <div class="widget-content mino">
                    <h6 class="bigstats"></h6>
                    <div id="big_stats" class="cf">
                      <div class="stat">
                        <h4>Enquiries</h4><span class="value"></span>
                      </div>

                      <div class="stat">
                        <h4>Job Applications</h4><span class="value"></span>
                      </div>
                      <div class="stat">
                        <h4>Active Vacancies</h4><span class="value"></span>
                      </div>


                    </div>
                  </div>

                </div>
              </div>
            </div>


          </div>

          <div class="span6">
            <div class="widget ">
              <div class="widget-header"> <i class="icon-bookmark"></i>
                <h3>Important Shortcuts</h3>
              </div>

              <div class="widget-content mino">
                <div class="shortcuts"> <a href="list_enq.php" class="shortcut"><i
                      class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Enquiries</span> </a>
                  <a href="list_apps.php" class="shortcut"><i class="shortcut-icon icon-bookmark"></i><span
                      class="shortcut-label">Job applications</span> </a>
                  <a href="list_vac.php" class="shortcut"><i class="shortcut-icon icon-bookmark"></i><span
                      class="shortcut-label">Job Vacancies</span> </a>
                  <a href="dm-enq.php" class="shortcut"> <i class="shortcut-icon icon-bookmark"><span
                        style="font-size:14px;position:absolute;color:White;background-color:red;padding:1px 5px 1px 5px;border-radius:50%;">
                        0</span></i><span class="shortcut-label">DM Consulting Enquiries
                    </span> </a>
                  <a href="service-enq.php" class="shortcut"> <i class="shortcut-icon icon-bookmark"><span
                        style="font-size:14px;position:absolute;color:White;background-color:red;padding:1px 5px 1px 5px;border-radius:50%;">
                        0</span></i><span class="shortcut-label">Service Enquiries
                    </span> </a>
                  <a href="floating-enq.php" class="shortcut"> <i class="shortcut-icon icon-bookmark"><span
                        style="font-size:14px;position:absolute;color:White;background-color:red;padding:1px 5px 1px 5px;border-radius:50%;">
                        0</span></i><span class="shortcut-label">Floating Enquiry Data
                    </span> </a>
                </div>

              </div>

            </div>
          </div>
          <div class="span12">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Recent Job Applications</h3>
              </div>

              <div class="widget-content">
                <table class="table table-striped table-bordered">



                  <tr>
                    <th>Name</th>

                    <th>Phone</th>
                    <th>Email</th>
                    <!-- Add more headers if needed -->
                    <th>View</th>
                  </tr>
                  <?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo isset($row['name']) ? $row['name'] : ''; ?></td>
        <td><?php echo isset($row['phone']) ? $row['phone'] : ''; ?></td>
        <td><?php echo isset($row['mail']) ? $row['mail'] : ''; ?></td>
        <td><button><a href="">View</a></button></td>
        <!-- Add more columns if needed -->
      
    </tr>
    <?php
}
?>
                </table>




                </table>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
  </div>



  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="js/jquery-1.7.2.min.js"></script>
  <script src="js/excanvas.min.js"></script>
  <script src="js/chart.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js"></script>
  <script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
  <script src="js/base.js"></script>

</body>

</html>