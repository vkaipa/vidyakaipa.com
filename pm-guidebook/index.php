<!doctype html>
<html class="no-js" lang="en-us">


<head>
  <meta charset="utf-8">
  <title>PM Guidebook</title>
  <meta name="description" content="Curated reading lists designed to accelerate your product career">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="assets/vendor/html5-boilerplate_v7.3.0/css/normalize.css">
  <link rel="stylesheet" href="assets/vendor/html5-boilerplate_v7.3.0/css/main.css">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit-icons.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="main.css">
</head>


<body>

  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

<header>
  <div class="nav">
    <p>PM Guidebook</p>
  </div>
</header>

<div class="results flex">
  <div class="breakdown">
    <div class="circle">
      <p class="percent">45%</p>
    </div>
    <div class="uk-tile uk-tile-muted uk-tile-primary uk-padding-small">
      <p class="uk-h4">Product Skills</p>
    </div>
    <h3>Top Skills to Improve</h3>
    <ul class="uk-list uk-list-bullet">
      <li>Artifacts</li>
      <li>User Studies</li>
    </ul>
  </div>

  <div class="breakdown">
    <div class="circle">
      <p class="percent">85%</p>
    </div>
    <div class="uk-tile uk-tile-muted uk-tile-primary uk-padding-small">
      <p class="uk-h4">General Skills</p>
    </div>
    <h3>Top Skills to Improve</h3>
    <ul class="uk-list uk-list-bullet">
      <li>Communication</li>
      <li>Stakeholder Management</li>
    </ul>
  </div>
 

  </div>
</div>

<hr class="uk-divider-icon">

<div class="results">
  <h2>Recommended Reading</h2>

  <ul id='resources-results' class="uk-list uk-list-bullet">
    
  </ul>

</div>

<div class="footer">
    <p>Created by Vidya Kaipa, inspired by Sebastien Phlix</p>
</div>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>

  <script type="text/javascript" src='tf_to_skills.js'></script>
  <script type="text/javascript" src='https://cdnjs.com/libraries/handlebars.js'></script>

  <script type='text/template' id='resourceItem'>
    <li><a href="{{url}}">{{title}}</a> by {{author}}</li>
  </script>

  <script src="js/main.js"></script>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-84200612-1', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>


</html>
