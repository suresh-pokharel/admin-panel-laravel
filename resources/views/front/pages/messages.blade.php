@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">

            <h3 class="animate-onscroll no-margin-top"><?php 
            if($data->title=="our_vision")
              echo"Our Vision";
            elseif ($data->title=="our_mission")
              echo "Our Mission";
            elseif ($data->title=="our_history")
              echo "Our History";
            elseif ($data->title=="our_objectives")
              echo "Our Objectives";
            elseif ($data->title=="christian_history")
              echo "Christian History in Nepal";
            elseif ($data->title=="message-from-chairman")
              echo "Message From Chairperson";
            elseif ($data->title=="message-from-president")
              echo "Message From President";
            elseif ($data->title=="message-from-secretary")
              echo "Message From General Secretary";
             ?></h3>
                
               @if($data->image!='')
                <img class="align-right animate-onscroll" src="{{asset($data->image)}}" alt="">
              @endif
                <p class="animate-onscroll">{!!$data->description!!}</p>
                
                <br class="clearfix">
         <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-581de65fcc6848b8"></script>
                

          </div>     
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection