@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

    <!-- Page Heading -->
      <section class="section page-heading">
        
        <h1>Gallery</h1>

      </section>
      <!-- Page Heading -->
       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">
            <!-- Media Filters -->
            <div class="media-filters animate-onscroll">
              
              <div class="filter-filtering">
              
                <label>Show:</label>
                <ul class="filter-dropdown">
                  <li><span>All</span>

                    <ul>
                      <li class="filter" data-filter="all">All</li>
                      <li class="filter" data-filter=".category-Video">Videos</li>
                      <li class="filter" data-filter=".category-Image">Photos</li>
                      
                    @foreach($cats as $cat)
                      <li class="filter" data-filter=".category-{{$cat->category}}">{{$cat->category}}</li>
                     <!--  <li class="filter" data-filter=".category-meetings">Meetings</li>
                      <li class="filter" data-filter=".category-Video">Videos</li>
                      <li class="filter" data-filter=".category-Image">Photos</li>
                      <li class="filter" data-filter=".category-naya">Naya</li> -->
                    @endforeach
                    </ul>
                  </li>
                </ul>
              
              </div>
              
              <label>Sort by:</label>
              <div class="filter-sorting">
             <!--    
                <div class="order-group active-sort ascending-sort">
                  <button class="small sort sorting-asc" data-sort="nameorder:asc">Name</button>
                  <button class="small sort sorting-desc" data-sort="nameorder:desc">Name</button>
                </div> -->
                
                <div class="order-group">
                  <button class="small sort sorting-asc" data-sort="dateorder:asc">Date</button>
                  <button class="small sort sorting-desc" data-sort="dateorder:desc">Date</button>
                </div>
                
              </div>
              
            </div>
            <!-- /Media Filters -->
            
            
            
            <div class="media-items row">
            @foreach($galleries as $item)  
            <?php 
              $image_path= asset($item->image);
             ?>
              <div class="{{'col-lg-4 col-md-6 col-sm-12 mix category-'.$item->iv. ' category-'.$item->category}}" data-nameorder="1" data-dateorder="{{$item->id}}">
              <div class="media-item animate-onscroll gallery-media">

                
                <div class="media-image">
                  <img src="{{asset($item->image)}}" alt="">
                  <label>{{$item->title}}</label>
                  <div class="media-hover">
                    <div class="media-icons">
                      

                      <!-- <i class="icons icon-zoom-in"></i> -->
                      @if($item->iv=='Video')
                      <a href="https://www.youtube.com/watch?v={{$item->url}}" data-group="media-jackbox" data-thumbnail="{{asset($item->image)}}" class="jackbox media-icon">
                      <i class="icons icon-play"></i></a>
                      @else
                      <a href="{{asset($item->image)}}" data-group="media-jackbox" data-thumbnail="{{asset($item->image)}}" class="jackbox media-icon">
                      <i class="icons icon-zoom-in"></i>
                      </a>
                      @endif
                      
                     
                    </div>
                  </div>
                
                </div>
                
                                
              </div>            
              </div>
              @endforeach
          <!--     <div class="col-lg-4 col-md-6 col-sm-12 mix category-videos category-meetings" data-nameorder="2" data-dateorder="1">
              <div class="media-item animate-onscroll gallery-media">
                
                <div class="media-image">
                
                  <img src="{{asset('assets/images/media/media2-medium.jpg')}}" alt="">
                  <label>This Picture is taken after conducting the tenth annual general meeting </label>
                  
                  <div class="media-hover">
                    <div class="media-icons">
                     
                   
                    </div>
                  </div>
                
                </div>
                
                                
              </div>
                          
              </div> -->
              
              
   <!--            
              <div class="col-lg-4 col-md-6 col-sm-12 mix category-campaign category-videos category-meetings" data-nameorder="3" data-dateorder="2">
              
                                       
              <div class="media-item animate-onscroll gallery-media">
                
                <div class="media-image">
                
                  <img src="{{asset('assets/images/media/media3-medium.jpg')}}" alt="">
                  <label>This Picture is taken after conducting the tenth annual general meeting </label>
                  
                  <div class="media-hover">
                    <div class="media-icons">
                      <a href="https://www.youtube.com/watch?v=1WbQe-wVK9E" data-group="media-jackbox" data-thumbnail="{{asset('assets/images/media/media3-medium.jpg')}}" class="jackbox media-icon"><i class="icons icon-play"></i></a>
                    </div>
                  </div>
                
                </div>
                
                                
              </div>
                      
              </div> -->

            </div>
            
            
          </div> 
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection