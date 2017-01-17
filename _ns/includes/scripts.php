      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
      <script>
          (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
          function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
          e=o.createElement(i);r=o.getElementsByTagName(i)[0];
          e.src='//www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
          ga('create','UA-XXXXX-X','auto');ga('send','pageview');
      </script>-->

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84200612-1', 'auto');
  ga('send', 'pageview');

  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  <script type="text/javascript">
        var $nav = $("#menu-list");

        $("#menu-trigger").click(function(event) {
          event.preventDefault();
          if ($(window).outerWidth() < 1100) {
            $nav.toggle();
          }
        });

        $(window).resize(function() {
          if ($(window).outerWidth() < 1100) {
            $nav.hide();
          } else {
            if ($nav.filter(":visible").length === 0) {
              $nav.show();
            }
          }
          
        });
  </script>

  <script type="text/javascript" src="js/vendor/balance-text.js"></script>

  <script type="text/javascript">
        $("body").on("click", ".animate-scroll", function(e) {
          var $this = $(this);
          var targetOffset = $($this.attr("href")).offset().top;
          
          e.preventDefault(); 

          $("html, body").animate({
            scrollTop: targetOffset+10+"px"
          });
        });
  </script>
