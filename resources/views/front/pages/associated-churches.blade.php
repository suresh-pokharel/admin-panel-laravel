@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

    <!-- Page Heading -->
      <section class="section page-heading">
        
        <h1>Associated Churches</h1>

      </section>
      <!-- Page Heading -->
       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">
            
             <ul class="list-inline" style="font-size: 12px;">
                      <!-- <li><a href="{{ url('/churches/m') }}">A</a> |</li> -->
                    <li><b><a href="{{ url('/churches') }}">All</a></b></li>
                     <?php
                        for($i=65;$i<91;$i++){
                          $link=url('churches')."/".chr($i);
                         echo "<li><a href=".$link.">".chr($i)."</a> |</li>";
                    }
                    ?>
              </ul>

              <table class="shopping-cart-table animate-onscroll">
              <?php static $sn=1;?>
              <tr>
              	<th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Pastor's name</th>
                <th>Phone</th>
              </tr>
              @foreach($churches as $church)
              <tr>
              	<td><?php echo $sn; $sn++; ?></td>
                <td><strong>{{$church->name}}</strong></td>
                <td>{{$church->address}}</td>
                <td>{{$church->pastors_name}}</td> 
                <td>{{$church->phone}}</td>
                
              </tr>
              @endforeach
             
              
              <tr>

              </tr>
              
            </table>

            {{ $churches->links() }}
            
          </div>     
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection