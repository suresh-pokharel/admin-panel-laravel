@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">

            <h3 class="animate-onscroll no-margin-top">Christian History</h3>
                
                
                <img class="align-right animate-onscroll" src="{{asset('assets/images/about2.jpg')}}" alt="">
                
                <p class="animate-onscroll">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna.</p>
                
                <p class="animate-onscroll">Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. </p>
                
                <br class="clearfix">
       
          </div>     
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection