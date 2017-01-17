<?php
    $pathDepth = '';
    $pageTitle = 'Home';
    $pageId = '';
    include($pathDepth . 'includes/head.php');
    include($pathDepth . 'includes/navbar.php');
?>

<div class="header logo-vh-center">   
  <img src="/assets/img/avatar.png" class="profile-picture" />
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
      She excels in delivering human-centered marketing solutions to the tech industry through content strategy and web design. 
      She's passionate about combining design thinking and a global perspective to create sustainable long-term solutions for mid-sized corporations and startups tackling important systemic issues. Click the links below to learn more and see what others have said of her work!</p>
      <div class="buttons">
          <a href="/services#content-strategy" class="btn animate-scroll">Content Strategy</a>
          <a href="/services#project-management" class="btn animate-scroll">Project Management</a>
          <a href="/services#partnerships" class="btn animate-scroll">Partnerships</a>
      </div>
  </div>
</div>


<div class="nonhero grey" id="services">
<?php include($pathDepth . 'includes/services-grid.php'); ?>
    <a id ="circles-button" href="mailto:vidyalkaipa@gmail.com">Contact Vidya</a>
</div>

    
<?php include($pathDepth . 'includes/work-grid.php'); ?>
<a id ="circles-button" href="/work/">See all work</a>

<br>

<?php include($pathDepth . 'includes/scripts.php'); ?>
    
<!-- page specific html goes here! -->

<?php include($pathDepth . 'includes/footer.php'); ?>

