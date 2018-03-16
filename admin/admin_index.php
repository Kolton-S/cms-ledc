<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);

   require_once('phpscripts/config.php');
   confirm_logged_in();
   $id = $_SESSION['user_id'];
   // echo $id;
   $tbl = "tbl_user";
   $col = "user_id";
   $popForm = getSingle($tbl, $col, $id);
   $found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
   if($found_user['needs_edit'] == 1){
     redirect_to("admin_edituser.php");
   }
   ?>
<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>LEDC - Portal Home</title>
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php include('templates/navigation.php'); ?>
      <?php if(!empty($fail_message)){echo $fail_message;}?>
      <?php if(!empty($message)){echo $message;}?>
      <?php if(!empty($mysqlQueryResponse)){echo $mysqlQueryResponse;}?>
      <?php if(!empty($regmessage)){echo $regmessage;}?>
      <section id="menuSelection">
         <h2 id="actionTitle">Action Menu</h2>
         <a href="admin_register.php"><button class="buttonStyle homeButton">Register New User</button></a><br>
         <a href="admin_edituser.php"><button class="buttonStyle homeButton">Edit User</button></a><br>
         <a href="admin_deleteuser.php"><button class="buttonStyle homeButton">Delete User</button></a><br>
         <a href="admin_content.php"><button class="buttonStyle homeButton">Page Contents</button></a>
      </section>
      <section id="analytics">
         <h2 id="analyticsTitle">Website Traffic</h2>
         <div id="embed-api-auth-container"></div>
         <div id="chart-1-container"></div>
         <div id="chart-2-container"></div>
         <div id="view-selector-1-container"></div>
         <div id="view-selector-2-container"></div>
      </section>
   </body>
   <script>
      (function(w,d,s,g,js,fs){
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
        js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
        js.src='https://apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
      }(window,document,'script'));
   </script>
   <script>
      gapi.analytics.ready(function() {

        /**
         * Authorize the user immediately if the user has already granted access.
         * If no access has been created, render an authorize button inside the
         * element with the ID "embed-api-auth-container".
         */
        gapi.analytics.auth.authorize({
          container: 'embed-api-auth-container',
          clientid: '744137062436-leoq8ba5egclm2cpo8sb9nn3ar67nm94.apps.googleusercontent.com'
        });


        /**
         * Create a ViewSelector for the first view to be rendered inside of an
         * element with the id "view-selector-1-container".
         */
        var viewSelector1 = new gapi.analytics.ViewSelector({
          container: 'view-selector-1-container'
        });

        /**
         * Create a ViewSelector for the second view to be rendered inside of an
         * element with the id "view-selector-2-container".
         */
        var viewSelector2 = new gapi.analytics.ViewSelector({
          container: 'view-selector-2-container'
        });

        // Render both view selectors to the page.
        viewSelector1.execute();
        viewSelector2.execute();


        /**
         * Create the first DataChart for top countries over the past 30 days.
         * It will be rendered inside an element with the id "chart-1-container".
         */
        var dataChart1 = new gapi.analytics.googleCharts.DataChart({
          query: {
            metrics: 'ga:sessions',
            dimensions: 'ga:country',
            'start-date': '30daysAgo',
            'end-date': 'yesterday',
            'max-results': 6,
            sort: '-ga:sessions'
          },
          chart: {
            container: 'chart-1-container',
            type: 'PIE',
            options: {
              width: '100%',
              pieHole: 4/9
            }
          }
        });


        /**
         * Create the second DataChart for top countries over the past 30 days.
         * It will be rendered inside an element with the id "chart-2-container".
         */
        var dataChart2 = new gapi.analytics.googleCharts.DataChart({
          query: {
            metrics: 'ga:sessions',
            dimensions: 'ga:country',
            'start-date': '30daysAgo',
            'end-date': 'yesterday',
            'max-results': 6,
            sort: '-ga:sessions'
          },
          chart: {
            container: 'chart-2-container',
            type: 'PIE',
            options: {
              width: '100%',
              pieHole: 4/9
            }
          }
        });

        /**
         * Update the first dataChart when the first view selecter is changed.
         */
        viewSelector1.on('change', function(ids) {
          dataChart1.set({query: {ids: ids}}).execute();
        });

        /**
         * Update the second dataChart when the second view selecter is changed.
         */
        viewSelector2.on('change', function(ids) {
          dataChart2.set({query: {ids: ids}}).execute();
        });

      });
   </script>
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="js/timeupdate.js"></script>
</html>
