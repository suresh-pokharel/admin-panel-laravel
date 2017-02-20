@extends('front.layout.master')  

@section('content')


      
    <section id="content"> 

   
       
     <!-- Section -->
      <section class="section full-width-bg gray-bg">
        
        <div class="row">
        
          <div class="col-lg-9 col-md-9 col-sm-8">
                        <h3 class="animate-onscroll no-margin-top">Our Location</h3>
            
            <div class="contact-map">
              <!-- <iframe width="900" height="400" src="https://maps.google.rs/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=marmora+road&amp;sll=44.210767,20.922416&amp;sspn=4.606139,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Marmora+Rd,+London+SE22+0RX,+United+Kingdom&amp;t=m&amp;z=14&amp;ll=51.451955,-0.055755&amp;output=embed"></iframe> -->
<!-- <iframe width="900" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/?ie=UTF8&amp;ll=27.723726,85.3243&amp;spn=0.012963,0.022659&amp;z=14&amp;output=embed"></iframe> -->
               <iframe width="900" height="400" src="https://maps.google.rs/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Serve+Now+Nepal&amp;sll=27.723726,85.3243&amp;sspn=4.606139,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Kathmandu,+Nepal&amp;t=m&amp;z=15&amp;ll=27.7237655,85.3257787&amp;output=embed"></iframe>
            </div>
            
            <div class="row">
              
              <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
                
                <h6>Mailing Address</h6>
                <p>Khursanitar<br>
                Lazimpat, Kathmandu</p>
                
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
                
                <h6>Phone Numbers</h6>
                <p>+977-1-4000090</p>
                
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">
                
                <h6>Email Addresses</h6>
                <p><a href="mailto:mail@companyname.com">adhakal@weservenow.org</a></p>
                
              </div>
              
            </div>
            
            
            
            <h3>We want to hear from you</h3>


            <form id="contact-form" action="#" method="POST">
              
              <div class="inline-inputs">
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <label>Fullname*</label>
                  <input type="text" name="contact-email">                
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <label>Email*</label>
                  <input type="text" name="contact-firstname">  
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <label>Message*</label>
                  <textarea rows="10" name="contact-message"></textarea>
                </div>
                
              </div>
              
              <input type="submit" value="submit">
              
            </form>
          </div>     
<!-- Sidebar -->

  @include('front.partials.sidebar')

 <!-- /Sidebar -->
          
          
          
        
        </div>
       
      </section>
      <!-- /Section -->
    
    </section>



    @endsection