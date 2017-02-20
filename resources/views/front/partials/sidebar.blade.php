<div class="col-lg-3 col-md-3 col-sm-4 sidebar">
    <!-- <div class="social-media animate-onscroll">
              <span class="small-caption">Get connected:</span>
              <ul class="social-icons">
                  <li class="facebook"><a href="#" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                  <li class="twitter"><a href="#" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                  <li class="google"><a href="#" class="tooltip-ontop" title="Google Plus"><i class="icons icon-gplus"></i></a></li>
                  <li class="youtube"><a href="#" class="tooltip-ontop" title="Youtube"><i class="icons icon-youtube-1"></i></a></li>
                  <li class="flickr"><a href="#" class="tooltip-ontop" title="Flickr"><i class="icons icon-flickr-4"></i></a></li>
                  <li class="email"><a href="#" class="tooltip-ontop" title="Email"><i class="icons icon-mail"></i></a></li>
              </ul>
    </div>   -->

     <!-- Search Box -->
   <!--   <div class="sidebar-box search-box white animate-onscroll">        
              <h3>Search</h3>
              <input type="text" placeholder="Enter text">
              <input type="submit" value="Search">
    </div> -->
    <!-- /Search Box --> 

<!-- Popular News -->
  <div class="sidebar-box white animate-onscroll">
              <h3>Popular news</h3>
              <ul class="popular-news">
<?php
      $popular=\DB::table('blogs')->orderBy('views', 'desc')->limit(3)->get();
?>                
                @foreach($popular as $row)
                <!-- Blog Item -->
                <li>
                  <div class="thumbnail">
                    <img src="{{asset($row->thumb)}}" alt="">
                  </div>
                  
                  <div class="post-content">
                    <h6><a href="{{ URL::to('blog',['id'=>$row->id])}}">{{$row->title}}</a></h6>
                    <div class="post-meta">
                      <small>{{date("M d, Y", strtotime(substr($row->created_at,0,10)))}}
                          <?php 
                          $date_24= substr($row->created_at,11,5);
                          $date_12=date("g:i A", strtotime($date_24));
                          echo $date_12;
                           //converting to 12 hour time format 
                         ?></small>
                    </div>
                  </div>
                </li>
                <!-- /Blog Item -->
                @endforeach
              </ul>
              
  </div>
<!-- /Popular News -->  

    <!-- Categories -->
    <!--   <div class="sidebar-box category-box white animate-onscroll">
        
        <h3>Categories</h3>
        <ul>
          <li><a href="#">Campaign</a></li>
          <li><a href="#">Politics</a></li>
          <li><a href="#">Meetings</a></li>
          <li><a href="#">Videos</a></li>
          <li><a href="#">Photos</a></li>
        </ul>
        
      </div> -->
  <!-- /Categories -->  

<!-- get featured video -->
<?php
     $video=\DB::table('galleries')->Where([['iv','Video'],['category','Featured']])->first();
?>
@if ($video!=null)
 <div class="sidebar-box white featured-video animate-onscroll">
              <h3>Featured Video</h3>
              <iframe width="560" height="315" src="http://www.youtube.com/embed/{{$video->url}}?wmode=transparent" allowfullscreen></iframe>
              <a href="{{ URL::to('gallery')}}" class="button transparent button-arrow">Visit gallery</a>
    </div>
    <!-- /Featured Video -->
@endif
       
<?php
     $events=\DB::table('events')->orderBy('date_event', 'desc')->limit(2)->get();
?>
    <!-- Upcoming Events -->
    <div class="sidebar-box white animate-onscroll">
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
                <!-- /Event -->
                
                <!-- Event -->
               <!--  <li>
                  <div class="date">
                    <span>
                      <span class="day">5</span>
                      <span class="month">JAN</span>
                    </span>
                  </div>
                  
                  <div class="event-content">
                    <h6><a href="event-post-v2.html">Sed in lacus ut enim</a></h6>
                    <ul class="event-meta">
                      <li><i class="icons icon-clock"></i> 4:00 pm - 6:00 pm</li>
                      <li><i class="icons icon-location"></i> 340 W 50th St.New York</li>
                    </ul>
                  </div>
                </li> -->
                <!-- /Event -->
                
              </ul>
              <a href="{{url('events')}}" class="button transparent button-arrow">More events</a>
    </div>
    <!-- /Upcoming Events -->  

 <!-- Image Banner -->
<!--     <div class="sidebar-box image-banner animate-onscroll">
      <a href="issues.html">
        <img src="{{asset('assets/images/main-issues.jpg')}}" alt="">
        <h3>The main issues</h3>
        <span class="button transparent button-arrow">Find out more</span>
      </a>
    </div> -->
<!-- /Image Banner -->        



</div>
         