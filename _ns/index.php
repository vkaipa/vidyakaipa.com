<?php
    $pathDepth = '';
    $pageTitle = 'Home';
    $pageId = '';
    include('includes/head.php');
    include('includes/navbar.php');
?>


<div class="header logo-vh-center">   
  <div id="profile-picture">
    <img src="/assets/img/avatar.png"/>
  </div>
  <div id="hero-title">
    <ul>
    <h1>
      <li>Digital storyteller</li>
      <li>Brand strategist</li>
      <li>Content marketer</li>
    </h1>
    <h2>
      <li>(comes with HTML/CSS experience)</li>
    </h2>
    </ul>
        <a id ="hero-button" href="mailto:vidyalkaipa@gmail.com">Schedule a meeting</a>
  </div>
</div>

<div class="top">
  <div class="content">
    <h2>About</h2>
      <p class="lead">Vidya is a data-driven marketing strategist and digital storyteller with a foundation in HTML/CSS. 
      She excels in delivering human-centered marketing solutions to the tech industry through content, email, and web design. 
      She's passionate about combining design thinking and a global perspective to create sustainable long-term solutions.</p>
      <div class="buttons">
          <a href="#content-strategy" class="btn animate-scroll">Content Strategy</a>
          <a href="#project-management" class="btn animate-scroll">Project Management</a>
          <a href="#partnerships" class="btn animate-scroll">Partnerships</a>
      </div>
  </div>
</div>

<div class="nonhero grey" id="services">
  <h2>Services</h2>
  
    <div class="circles-boss">

      <div class="circles c1">
       <p>Develop consistent brand narratives</p>
      </div>

      <div class="circles c2">
        <p>Create user-driven custom documentation</p>
      </div>

      <div class="circles c3">
        <p>Build dynamic content strategies &amp; calendars</p>
      </div>

      <div class="circles c4">
        <p>Measure &amp; optimize landing pages &amp; sites</p>
      </div>

    </div>

    <a id ="circles-button" href="mailto:vidyalkaipa@gmail.com">Contact Vidya</a>
</div>

<div class="nonhero" id="samples">
  <h2>Samples</h2>

    <div class="samples-boss">
      
      <a href="samples/index.html#content-design" class="blue">Content Design &amp; Documentation</a>

      <a href="samples/index.html#blog" class="green">Blog</a>
      
      <a href="samples/index.html#email" class="orange">Email</a>
      
      <a href="samples/index.html#web-content" class="grey">Website Content &amp; UX</a>

      <a href="samples/index.html#events" class="purple">Events</a>

      <a href="samples/index.html#metrics" class="white">Measurements, Metrics, &amp; A/B Testing</a>

      <a href="samples/index.html#sem" class="red">SEM &amp; Paid Advertising</a>

      <a href="samples/index.html#partnerships" class="yellow">Partnerships</a>

      <a href="samples/index.html#social-media" class="boxes pink">Social Media</a>

    </div>

    <a id ="circles-button" href="samples/index.html">See all samples</a>

 </div>

<div class="nonhero grey" id="case-studies">
  <h2>Use Cases</h2>
      
      <ul class="circles-boss">

        <li class="circles c1">
         <p>Marketing</p>
        </li>

        <li class="circles c2">
          <p>Design</p>
        </li>

        <li class="circles c3">
          <p>Research</p>
        </li>

        <li class="circles c4">
          <p>Client</p>
        </li>

      </ul>

    <a id ="circles-button" href="http://www.vidyakaipa.com/experiences/vidya-kaipa-marketing-experiences.pdf">See all use cases</a>
 </div>
 
<div class="nonhero" id="learn-more">
  <h2>Learn More</h2>
    
    <div class="rectangles-boss">
      
      <a href="../resumes/vidya-kaipa-marketing.pdf" class="rectangles pink tall">Resume</a>

      <a href="mailto:vidyalkaipa@gmail.com" class="rectangles blue tall">Email</a>

      <a href="http://www.linkedin.com/in/vidyakaipa" class="rectangles white short">LinkedIn</a>

      <a href="tel:14082304570" class="rectangles grey short">Call</a>

    </div>
 </div>
<!--
<div class="top">
<div class="buttons">
  <a href="../resumes/vidya-kaipa-marketing.pdf" class="btn animate-scroll" target="_blank">Resume</a>
  <a href="#work-samples" class="btn animate-scroll">Samples</a>
  <a href="#experiences" class="btn animate-scroll">Experience</a>
</div>
-->

<!--  <p><a class="btn btn-primary btn-lg" href="mailto:vidyalkaipa@gmail.com" role="button">Contact</a></p> -->


<?= include('includes/scripts.php'); ?>


<!-- page specific html goes here! -->


<?php include('includes/footer.php'); ?>