@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

    <!-- Page Heading -->
      <section class="section page-heading">
        
        <h1>Board Members</h1>

      </section>
      <!-- Page Heading -->
       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">
            
             <!-- <ul class="list-inline" style="font-size: 12px;">
                      
                    <li><b><a href="{{url('/boards') }}">All</a></b></li>
                    <?php
                     
                        // for($i=65;$i<91;$i++){
                        //   $link=url('boards')."/".chr($i);
                        //  echo "<li><a href=".$link.">".chr($i)."</a> |</li>";
                    //}
                    ?>
              </ul> -->

              @foreach($boards as $board)
                      <div class="col-lg-3 col-md-3 col-sm-6">
                
                                <!-- Team Member -->
                <div class="team-member animate-onscroll ">
                  
                  <img class="team-member-image" src="{{asset($board->image)}}" alt="">
                  
                  <div class="team-member-info" style="padding: 10px;">
                    
                    <center><strong>{{$board->fullname}}</strong></center>
                    <center><span class="job">{{$board->designation}}</span></center>

                    <div class="team-member-more">
                        <small>Address: <span class="small-caption">{{$board->address}}</span></small><br>
                        <small>Phone: <span class="small-caption">{{$board->phone}}</span></small><br>
                        <small>Bio: <span class="small-caption">{{$board->bio}}</span></small><br>
                        
                    </div>
                    
                  </div>
                  
                </div>
                <!-- /Team Member -->             
              </div>
              @endforeach
            
          </div>     
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection