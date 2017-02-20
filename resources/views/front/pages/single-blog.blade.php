@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

    <!-- Page Heading -->
      <section class="section page-heading">
        
        <h1>{{$blog->title}}</h1>
           <div class="post-meta animate-onscroll">
                <!-- <span>by <a href="#">admin</a></span> -->
                  <span><?php echo date("M d, Y", strtotime(substr($blog->created_at,0,10)))?>
                <?php 
                      $date_24= substr($blog->created_at,11,5);
                      $date_12=date("g:i A", strtotime($date_24));
                      echo $date_12;
                       //converting to 12 hour time format 
                     ?></span>

                <span><i class="icons icon-eye"></i>Views: {{$blog->views}}</span>
                <!-- <span><a href="blog-single-sidebar.html#comments">13 Comments</a></span> -->
              </div>

      </section>
      <!-- Page Heading -->
       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">

              <!-- Single Blog Post -->
            <div class="blog-post-single">
              <!-- Portfolio Slideshow -->
              <div class="portfolio-slideshow flexslider animate-onscroll">
                
                <ul class="slides">
                
                  <li><img src="{{asset($blog->image)}}" alt=""></li>
                  <!-- <li><img src="{{asset('assets/images/blog/2.jpg')}}" alt=""></li>
                  <li><img src="{{asset('assets/images/blog/1.jpg')}}" alt=""></li> -->                  
                </ul>
                
              </div>
              <!-- /Portfolio Slideshow -->
              

              
              <div class="post-content">
                <br>
                <!-- <blockquote class="align-right animate-onscroll" style="width:45%">"{!!$blog->highlight!!}"</blockquote> -->

                <p>{!!$blog->description!!}</p>

              </div>
              
               <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-581de65fcc6848b8"></script>
                


              
            </div>  
            <!-- /Single Blog Post -->  
              
              
  @include('front.partials.related-articles')       
   </div>          
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection