      
      <!-- Header -->
      <header id="header">
        
        <!-- Main Header -->
        <div id="main-header">
          
          <div class="container">
          
          <div class="row">
            <!-- Logo -->
            <div id="logo" class="col-lg-3 col-md-3 col-sm-3">
              
              <a href="{{url('')}}"><img src="{{asset('assets/images/logo.png')}}" alt="Serve Now Nepal"></a>
              
            </div>
            <!-- /Logo -->
            
            
            
            <!-- Main Quote -->
            <div class="col-lg-5 col-md-4 col-sm-4">
              
              <!-- <blockquote>Slogan of Federation of National Christian Nepal or some bible verse can be kept kere.</blockquote> -->
            <!--   <h1>Serve Now Nepal</h1>
              <blockquote>procastinate later..</blockquote> -->
              
            </div>
            <!-- /Main Quote -->
           
            <!-- Newsletter -->
            <div class="col-lg-4 col-md-5 col-sm-5">
              {{Form::open(array('url'=>'subscribe','method'=>'post'))}}
              
                <!-- http://velikorodnov.com/html/candidate/php/newsletter-form.php -->
                <h5><strong>Subscribe Us</strong> for regular updates</h5>
                <div class="newsletter-form">
                
                  <div class="newsletter-email" style="width: 100%">
                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email Address','class'=>'form-control')) }}
                  </div>
                  
               <!--    <div class="newsletter-zip">
                    <input type="text" name="newsletter-zip" placeholder="Zip code">
                  </div> -->
                  
                  <div class="newsletter-submit">
                    <input type="submit" value="">
                    <i class="icons icon-right-thin"></i>
                  </div>
                  
                </div>
                
              </form>
              @if(Session::has('success_message'))
                  <ul type="none" style="background-color:green">
                            <small><li>{{Session('success_message')}}</li></small>
                  </ul>
              @endif

              @if (count($errors) > 0)
                
                  <ul type="none" style="background-color:red">
                    @foreach ($errors->all() as $error)
                      <small><li>{{ $error }}</li></small>
                    @endforeach
                  </ul>

              @endif
      
            </div>
            <!-- /Newsletter -->
            
            
            
          </div>
          
          </div>
          
        </div>
        <!-- /Main Header -->
        
        
        
        
        
        <!-- Lower Header -->
        <div id="lower-header">
          
          <div class="container">
          
          <div id="menu-button">
            <div>
            <span></span>
            <span></span>
            <span></span>
            </div>
            <span>Menu</span>
          </div>
          
          <ul id="navigation">
            
            <!-- Home -->
            <li class="home-button {{{ (Request::is('/') ? 'current-menu-item' : '') }}}">
              <a href="{{url('')}}"><i class="icons icon-home"></i></a>
            </li>
            <!-- /Home -->
            
            <!-- Pages -->
            <li {{{ (Request::is('boards','misc/our_vision','misc/our_objectives','misc/our_mission') ? 'class=current-menu-item' : '') }}}>
            
              <span>About Us</span>
              
              <ul>

                <li><a href="{{ URL::to('misc',['title'=>'our_mission'])}}">Our Mission</a></li>
                <li><a href="{{ URL::to('misc',['title'=>'our_vision'])}}">Our Vision</a></li>
                <!-- <li><a href="{{ URL::to('misc',['title'=>'our_objectives'])}}">Objectives</a></li> -->
                <li><a href="{{ URL::to('boards')}}">Board Members</a></li>
            
              </ul>
              
            </li>
            <!-- /Pages -->
            
            <!-- Events -->
            <li {{{ (Request::is('misc/message-from-chairman','misc/message-from-president','misc/message-from-secretary') ? 'class=current-menu-item' : '') }}}>
            
              <span>Messages</span>
              
              <ul>
              
                <li><a href="{{ URL::to('misc',['title'=>'message-from-chairman'])}}">Message from Chairman</a></li>
                <li><a href="{{ URL::to('misc',['title'=>'message-from-director'])}}">Message from National Director</a></li>                
              </ul>
              
            </li>
            <!-- /Events -->
            

             
               <!--  <li {{{ (Request::is('misc/our_history','misc/christian_history') ? 'class=current-menu-item' : '') }}}><span>History</span>
                    <ul>
                      <li><a href="{{ URL::to('misc',['title'=>'our_history'])}}">History of FNCN</a></li>
                      <li><a href="{{ URL::to('misc',['title'=>'christian_history'])}}">Christian Histroy in Nepal</a></li>
                    </ul>
                </li> -->

                 <li {{{ (Request::is('program/*') ? 'class=current-menu-item': '') }}}><span>Programs</span>
                 <?php $programs=\DB::table('programs')->orderBy('value', 'desc')->where('published','1')->limit(10)->get();?>
                    <ul>
                    @foreach($programs as $program)
                      <li><a href="{{ URL::to('program',['id'=>$program->id])}}">{{$program->title}}</a></li>
                    @endforeach
                     <!--  <li><a href="{{ URL::to('misc',['title'=>'christian_history'])}}">Christian Histroy in Nepal</a></li> -->
                    </ul>
                </li>


            <li {{{ (Request::is('blogs') ? 'class=current-menu-item' : '') }}}>
              <a href="{{url('blogs')}}">News & Events</a>
            </li>

            <li {{{ (Request::is('documents') ? 'class=current-menu-item' : '') }}}>
              <a href="{{url('documents')}}">Documents</a>
            </li>
           
            
            
            <!-- Blog -->
            <li {{{ (Request::is('gallery') ? 'class=current-menu-item' : '') }}}>
            
              <a href="{{url('gallery')}}">Gallery</a>
              <!-- 
              <ul>
              
                <li><a href="#">Photo Gallery</a></li>
                <li><a href="#">Video Gallery</a></li>

                
              </ul> -->
              
            </li>
            <!-- /Blog -->

            <li {{{ (Request::is('contact') ? 'class=current-menu-item' : '') }}}>
              <a href="{{url('contact')}}">Contact Us</a>
            </li>
            <!-- /Features -->
            
            <!-- Donate -->

            <!-- <li class="donate-button ">
              <a href="#">Donate Today</a>
            </li> -->

            <!-- /Donate -->
            
          </ul>
          
          </div>
          
        </div>
        <!-- /Lower Header -->
        
        
      </header>
      <!-- /Header -->