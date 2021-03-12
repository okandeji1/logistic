@extends('site.layouts.site')
@section('content')
<div class="page-title abt">
    <div class="container">
        <div class="padding-tb-150px">
            <!-- <h1>About Us</h1> -->
        </div>
    </div>
</div>


<!--============= About Us =============-->
<div class="nile-about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-mb-45px">

              <div class="section-title-right text-main-color clearfix">
                  <div class="icon"><img src="{{asset('site/icons/service-dark-4.png')}}" alt=""></div>
                  <h2 class="title-text">Who We Are ?</h2>
              </div>
              <div class="about-text margin-tb-25px">The Coach Express (Coach) prides itself as being one of the best
                  logistic companies in Nigeria. We support all types of businesses: small, medium and multinationals
                  with their logistic needs. </div>

                  <div class="about-text margin-tb-25px">  We exceed our customer’s expectation by combining great service delivery with technology
                    to provide logistics services that offer a high degree of reliability while remaining
                    cost effective. </div>

                    <div class="about-text margin-tb-25px">   We are in the pursuit of long-lasting relationships with our clients and as such we
                      continue to find the best ways to delivery solutions that improves the quality of life. </div>
            </div>
            <div class="col-lg-6">
                <img src="{{asset('site/images/coach_4.jpg')}}" style="height: auto; border-radius: 10px" alt="">
            </div>
        </div>
    </div>
</div>
<!--============= //About Us =============-->




<div class="nile-about-section_2" style="background-color: #f7f5f5;">
    <div class="container">
      <!-- <div class="container"> -->
          <div class="row">
            <div class="col-lg-6">
              <br>
              <br>
                <img src="{{asset('site/images/mission.png')}}" style="height: auto; border-radius: 10px" alt="">
            </div>
              <div class="col-lg-6 sm-mb-45px">
                <br>
                <br>
                <div class="section-title-right text-main-color clearfix">
                    <!-- <div class="icon"><img src="{{asset('site/icons/service-dark-4.png')}}" alt=""></div> -->
                    <h2 class="title-text">Our Vision</h2>
                </div>
                <div class="about-text margin-tb-10px">To create a world where delivery, time and technology provides for a frst time experience. </div>

                <div class="section-title-right text-main-color clearfix">
                    <!-- <div class="icon"><img src="{{asset('site/icons/service-dark-4.png')}}" alt=""></div> -->
                    <h2 class="title-text">Our Mission</h2>
                </div>
                <div class="about-text margin-tb-10px">To be the most reliable, affordable and dependable delivery company of choice. </div>

                <div class="about-text margin-tb-15px">
                  <div class="nile-widget widget_nav_menu sm-mb-45px">
                      <h2 class="title-text text-main-color">Core Values</h2>
                      <ul>
                        <li class="margin-tb-10px"><u style="font-weight:800;">Integrity:</u> We believe in a mutualy beneficial and honest relationship. </a></li>
                        <li class="margin-tb-10px"><u style="font-weight:800;">Consistency:</u> We are consistent in our operations for fast and effective service delivery. </a></li>
                          <li class="margin-tb-10px"><u style="font-weight:800;">Efficiency:</u> We pride ourselves with a team of experts who have the capacity to ensure each project is successful. </a></li>
                      </ul>
                  </div>
                </div>

              </div>

          </div>
          <br>
          <br>

      </div>
</div>
@endsection
