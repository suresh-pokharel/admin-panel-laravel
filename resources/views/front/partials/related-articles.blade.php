       <?php $results= \DB::table('blogs')->where('published','1')->orderBy(DB::raw('RAND()'))->take(3)->get();?>
   <!-- Related Articles -->
            <div class="related-articles">
              
              <h3 class="animate-onscroll">You may interested </h3>
              
              <div class="row">
              @foreach($results as $row)
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                  
                  <!-- Blog Post -->
                  <div class="blog-post animate-onscroll">
                    
                    <div class="post-image">
                      <img src="{{asset($row->thumb)}}" alt="">
                    </div>
                    
                    <h4 class="post-title"><a href="{{ URL::to('blog',['id'=>$row->id])}}">{{$row->title}}</a></h4>
                    
                    <div class="post-meta">
                      <span><?php echo date("M d, Y", strtotime(substr($row->created_at,0,10)))?>
                      <?php 
                      $date_24= substr($row->created_at,11,5);
                      $date_12=date("g:i A", strtotime($date_24));
                      echo $date_12;
                       //converting to 12 hour time format 
                     ?></span>
                    </div>
                    
                  </div>
                  <!-- /Blog Post -->
              
                </div>
              @endforeach
                
              </div>
              
            </div>
            <!-- /Related Articles -->