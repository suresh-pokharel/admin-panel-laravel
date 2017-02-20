@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8"> 
          @foreach($documents as $document)      
            <div class="alert-box alert-box-button info animate-onscroll">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4">
                    @if($document->file_type=='jpg'||$document->file_type=='jpeg'||$document->file_type=='PNG')
                        <a href="{{asset($document->image)}}" src="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset($document->image)}}" width="60"></a>
                      @elseif($document->file_type=='pdf')
                         <a href="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset('assets/images/icons/pdf.png')}}" height="60"></a>
                      @elseif($document->file_type=='doc'||$document->file_type=='docx')
                         <a href="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset('assets/images/icons/word.png')}}" height="60"></a>
                      @else
                         <a href="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset('assets/images/icons/file.png')}}" height="60"></a>
                      @endif
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4">
                  <p><strong>{{$document->title}}</strong></p>

                  <p>{!!substr($document->description,0,100+strpos(substr($document->description,100,20), " ")).".."!!}</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 align-right">
                  <a target="_blank" href="{{asset($document->image)}}" class="button button-arrow">Open File</a>
                </div>
              </div>
            </div>
          @endforeach 

            
          <div class="animate-onscroll">
              <div class="divider"></div>
               {{ $documents->links() }}
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