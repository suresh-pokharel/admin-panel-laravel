
<!DOCTYPE html>

<html>

  
<!-- Mirrored from velikorodnov.com/html/candidate/main-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2016 12:20:38 GMT -->
@include('front.partials.header-top')
  
  <body class="sticky-header-on tablet-sticky-header boxed-layout">
  
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "../../../connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>    
    <!-- Container -->
    <div class="container">
      
@include('front.partials.header')

@yield('content')

@include('front.partials.footer')

      
      
      
      <!-- Back To Top -->
      <a href="#" id="button-to-top"><i class="icons icon-up-dir"></i></a>
      
      
      
      <!-- Customize Box -->
    <!--  <div class="customize-box">
        
        <h5>Layout Settings</h5>
        
        <form id="customize-box">
          
          <label>Layout type:</label><br>
          <input type="radio" value="boxed" name="layout-type" id="boxed-layout-radio"><label for="boxed-layout-radio">Boxed</label>
          <input type="radio" value="wide" name="layout-type" checked="checked" id="wide-layout-radio"><label for="wide-layout-radio">Wide</label>
          
          <br>
          
          <label>Background:</label>
          <select id="background-option" class="chosen-select">
            <option value=".background-color">Color</option>
            <option selected value=".background-image">Background</option>
          </select>
          
          <div class="background-color">
            <div id="colorpicker"></div>
            <input type="hidden" id="colorpicker-value" value="#000">
          </div>
          
          <div class="background-image">
            <input type="radio" value="image/background/1.jpg" name="background-image-radio" id="background-img-radio-1" checked>
            <label for="background-img-radio-1"><img src="images/background/1-thumb.jpg" alt=""></label>
            
            <input type="radio" value="img/background/2.jpg" name="background-image-radio" id="background-img-radio-2">
            <label for="background-img-radio-2"><img src="images/background/2-thumb.jpg" alt=""></label>
            
            <input type="radio" value="img/background/3.jpg" name="background-image-radio" id="background-img-radio-3">
            <label for="background-img-radio-3"><img src="images/background/3-thumb.jpg" alt=""></label>
          </div>
          
          <input type="submit" value="Submit">
          <input type="reset" value="Reset">
          
        </form>
        
        <div class="customize-box-button">
          <i class="icons icon-cog-3"></i>
        </div>
        
      </div> -->
      <!-- /Customize Box -->
    
    </div>
    <!-- /Container --> 
  
    <!-- JavaScript -->
    
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    
    <!-- Modernizr -->
    <script type="text/javascript" src="{{asset('assets/js/modernizr.js')}}"></script>
    
    <!-- Sliders/Carousels -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    
    <!-- Revolution Slider  -->
    <script type="text/javascript" src="{{asset('assets/js/revolution-slider/js/jquery.themepunch.plugins.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
    
    <!-- Calendar -->
    <script type="text/javascript" src="{{asset('assets/js/responsive-calendar.min.js')}}"></script>
    
    <!-- Raty -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.raty.min.js')}}"></script>
    
    <!-- Chosen -->
    <script type="text/javascript" src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
    <!-- jFlickrFeed -->
    <script type="text/javascript" src="{{asset('assets/js/jflickrfeed.min.js')}}"></script>
    
    <!-- InstaFeed -->
    <script type="text/javascript" src="{{asset('assets/js/instafeed.min.js')}}"></script>
    
    <!-- Twitter -->
    <script type="text/javascript" src="{{asset('assets/php/twitter/jquery.tweet.js')}}"></script>
    
    <!-- MixItUp -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.mixitup.js')}}"></script>
    
    <!-- JackBox -->
    <script type="text/javascript" src="{{asset('assets/jackbox/js/jackbox-packed.min.js')}}"></script>
    
    <!-- CloudZoom -->
    <script type="text/javascript" src="{{asset('assets/js/zoomsl-3.0.min.js')}}"></script>
    
    <!-- ColorPicker -->
    <script type="text/javascript" src="{{asset('assets/js/colorpicker.js')}}"></script>
    
    <!-- Main Script -->
    <script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
    
    
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/jquery.placeholder.js"></script>
      <script type="text/javascript" src="js/script_ie.js"></script>
    <![endif]-->
    
    
  </body>


<!-- Mirrored from velikorodnov.com/html/candidate/main-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2016 12:22:21 GMT -->
</html>