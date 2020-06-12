<!doctype html>
<html class="no-js" lang="en-us">


<head>
  <meta charset="utf-8">
  <title>PM Guidebook</title>
  <meta name="description" content="Curated reading lists designed to accelerate your product career">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="icon.png">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/css/uikit.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/main.css">
</head>


<body>

  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

<!-- START HEADER SECTION -->
  <header>
    <div class="nav">
      <p>PM Guidebook</p>
    </div>
  </header>
<!-- END HEADER SECTION -->


<!-- START PERCENTAGE SECTION -->
  <div class="results flex" style="display:none">

    <div class="pair">
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

    <div class="pair">
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
<!-- END PERCENTAGE SECTION -->


<!-- END RESOURCES SECTION -->
  <div class="results">
    <img src="assets/img/undraw_resources.svg"/>
    <h2>Recommended Reading</h2>
    <div id="loadingMessage" class='centered hidden'>
      <p>{{ message }}</p>
    </div>
    <span id='resources-results'>
    </span>
  </div>
<!-- END RESOURCES SECTION -->


<!-- START CONTRIBUTE SECTION -->
  <div class="contribute">
    <h3>Want to contribute?</h3>
    <div class="flex">
      <div class="quad">
        <p uk-margin>
          <a class="uk-button uk-button-default uk-button-large" href="https://docs.google.com/forms/d/e/1FAIpQLSfnuBEoYxPl1AONMs9ymy1V3Zkp9hlc8Lz2HN-13DWb7jJcRw/viewform">Submit a resource</a>
        </p>
      </div>
      <div class="quad">
        <p uk-margin>
          <a class="uk-button uk-button-default uk-button-large" href="https://www.facebook.com/sharer/sharer.php?u=https://pmguidebook.typeform.com/to/W480Qz" target="_new">Share on Facebook</a>
        </p>
      </div>
      <div class="quad">
        <p uk-margin>
          <a class="uk-button uk-button-default uk-button-large" href="https://twitter.com/intent/tweet?text=Leapfrog%20your%20product%20career%20development%20with%20this%20free%20survey%20and%20customized%20reading%20list!%0A%E2%86%92%20https://pmguidebook.typeform.com/to/W480Qz" target="_new">Share on Twitter</a>
        </p>
      </div>
       <div class="quad">
        <p uk-margin>
          <a class="uk-button uk-button-default uk-button-large" href="https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fpmguidebook.typeform.com%2Fto%2FW480Qz&title=Product%20Manager%20Evaluation" target="_new">Share on LinkedIn</a>
        </p>
      </div>
    </div>
  </div>
<!-- END CONTRIBUTE SECTION -->


<!-- START FOOTER SECTION -->
  <div class="footer">
    <p>Created by Vidya Kaipa, inspired by Sebastien Phlix</p>
  </div>
<!-- END FOOTER SECTION -->


  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
  <script src="/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script type="text/javascript" src='assets/surveyResourceMap.js'></script>
  <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js'></script>

  <script type='text/template' id='resources'>
    <ul uk-accordion>
      <li>
        <a class="uk-accordion-title" href="#">
          <h3 class="uk-heading-line"><span>{{skill}}</span></h3>
        </a>

        <div class="uk-accordion-content">
          <img src='{{image_path}}'>
          <ul uk-accordion class="uk-list uk-list-bullet">
            {{#each resources}}
              <li>
                <a href="{{this.url}}">{{title}}</a> by {{author}}
              </li>
            {{/each}}
          </ul>
        </div>
      </li>
    </ul>
  </script>

<!--  <script type='text/template' id='resourceItem'>
    <li><a href="{{url}}">{{title}}</a> by {{author}}</li>
  </script>
-->

  <script src="assets/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit-icons.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-84200612-1', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>


</html>
