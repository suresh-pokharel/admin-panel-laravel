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
            <?php $events=\DB::table('events')->orderBy('id', 'desc')->take(10)->get();?>
             <h3>Latest Events</h3>
              <ul class="upcoming-events">
                <!-- Event -->
               @foreach($events as $event)
                        <!-- Event -->

                        <li>
                          <div class="date">
                            <span>
                              <span class="day">{{substr($event->date_event,8,2)}}</span>
                              <span class="month">{{date('M', mktime(0, 0, 0,substr($event->date_event,8,2),10))}}</span>
                            </span>
                          </div>
                          
                          <div class="event-content">
                            <h6><a href="#">{{$event->title}}</a></h6>
                            <ul class="event-meta">
                              <li><i class="icons icon-clock"></i><?php 
                      $date_24= substr($event->date_event,11,5);
                      $date_12=date("g:i A", strtotime($date_24));
                      echo $date_12;
                       //converting to 12 hour time format 
                     ?></li>
                              <li><i class="icons icon-location"></i> {{$event->address}}</li>
                            </ul>
                          </div>
                        </li>
                        <!-- /Event -->
              @endforeach
            </ul>
          </div>     
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection