<!-- Footer -->
<footer class="page-footer blue accent-2">
    <div class="container">
      <div class="row">
        <div class="col m4 s12 center-align">
          <h5 class="white-text"><img src="img/PROFIND.png" alt="" width="150px"></h5>
          <div class="divider"></div>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col m4 s12 offset-m4 center-align">
          <h4 class="white-text">Connect</h4>
          <div class="divider"></div>
          <ul>
            <li><a class="white-text" href="#!"><i class="fab fa-facebook-square fa-2x tooltipped" data-tooltip="facebook" data-position="left"></i></a></li> 
            <li><a class="white-text" href="#!"><i data-tooltip="instagram" class="tooltipped fab fa-instagram fa-2x red-text" data-position="left"></i></a></li>
            <li><a class="white-text" href="#!"><i data-tooltip="twitter" class="tooltipped fab fa-twitter fa-2x" data-position="left"></i></a></li>
            <li><a class="white-text" href="#!"><i data-tooltip="linkedin" class="tooltipped fab fa-linkedin fa-2x" data-position="left"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container center-align">
      &copy;CODEMAX
      </div>
    </div>
  </footer>

  <!-- Footer -->

     




    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script>
      // M.AutoInit();
      document.addEventListener('DOMContentLoaded', function() {
      const scroll = document.querySelectorAll('.scrollspy');
      M.ScrollSpy.init(scroll, {});
      const sideNav = document.querySelector('.sidenav');
      M.Sidenav.init(sideNav, {});
      const dropDown = document.querySelectorAll('.dropdown-trigger');
      M.Dropdown.init(dropDown, {});
      const parallax = document.querySelectorAll('.parallax');
      M.Parallax.init(parallax, {});
      const carousel = document.querySelectorAll('.carousel');
      M.Carousel.init(carousel, {
        indicators: true,
        fullWidth: true,
        // duration: 100
      });
      const tooltip = document.querySelectorAll('.tooltipped');
      M.Tooltip.init(tooltip, {});
      const slide = document.querySelectorAll('.slider');
      M.Slider.init(slide, {});
      const modal = document.querySelectorAll('.modal');
      M.Modal.init(modal, {});
      const materialBox = document.querySelectorAll('.materialboxed');
      M.Materialbox.init(materialBox, options);
      M.toast({html: 'I am a toast!', classes: 'rounded'});
  });
  $('.alert').on('click',function(){
                $(this).fadeOut();
            })
    </script>
</body>
</html>