@extends('site.layouts.site')
@section('content')
<div class="page-title what">
    <div class="container">
        <div class="padding-tb-150px">
            <!-- <h1><span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOur Services</span></h1> -->
        </div>
    </div>
</div>


<div class="padding-tb-100px">

    <div class="container">
        <div class="section-title margin-bottom-40px">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="icon"><i class="fa fa-ravelry" style="color: green;"></i></div>
                    <br>
                    <div class="h2">Our Services</div>
                    <div class="des">Our services are designed to assist with prompt delivery of logistic solutions.
                    </div>
                </div>
            </div>
        </div>
          <div class="col-lg-12 sm-mb-45px">
            <div class="background-white thum-hover box-shadow hvr-float full-width wow fadeInUp" style="border-radius: 10px;">
              <div class="float-md-left margin-right-30px thum-xs padding-20px">
                <img src="{{asset('site/images/coach_2.jpg')}}" alt="">
              </div>
              <div class="padding-20px">
                <!-- <i class="fa fa-folder-open text-main-color"></i> -->
              <h4><a class="text-main-color">  <i class="fa fa-motorcycle"></i> Ecommerce Logistics</a></h4>
                <!-- <a href="#" class="text-main-color">Articles </a> -->
                <p>We provide ecommerce logistic services for business and individuals by offering one of
                  the best courier solutions. Our ecommerce services cover online business, business to
                  business (B2B), Business to Customer (B2C) and customer to customer (C2C) services. We
                  can also partner with you for the right delivery solutions that best suits your business
                  needs.</p>
              </div>
              <div class="clearfix"></p>
            </div>
          </div>
        </div>
          <br>
          <br>
          <div class="col-lg-12 sm-mb-45px">
            <div class="background-white thum-hover box-shadow hvr-float full-width wow fadeInUp" style="border-radius: 10px;">
              <div class="float-md-left margin-right-30px thum-xs padding-20px">
                <img src="{{asset('site/images/coach_7.jpg')}}" alt="">
              </div>
              <div class="padding-20px">
                <!-- <i class="fa fa-folder-open text-main-color"></i> -->
              <h4><a class="text-main-color">  <i class="fa fa-truck"></i> Corporate Logistics</a></h4>
                <!-- <a href="#" class="text-main-color">Articles </a> -->
                <p>Our Corporate courier service allows you book on demand for our services. We have expertise in ensuring that we
                   work with you on all your corporate logistic planning. We can also assist you with inter-office mail delivery needs.</p>
              </div>
              <div class="clearfix"></p>
            </div>
          </div>
        </div>
        <br>
        <br>
        <div class="col-lg-12 sm-mb-45px">
          <div class="background-white thum-hover box-shadow hvr-float full-width wow fadeInUp" style="border-radius: 10px;">
            <div class="float-md-left margin-right-30px thum-xs padding-20px">
              <img src="{{asset('site/images/coach_13.jpg')}}" alt="">
            </div>
            <div class="padding-20px">
              <!-- <i class="fa fa-folder-open text-main-color"></i> -->
            <h4><a class="text-main-color">  <i class="fa fa-medkit"></i> Medical Logistics</a></h4>
              <!-- <a href="#" class="text-main-color">Articles </a> -->
              <p>  We understand the sensitive nature of this shipment and we offer the best logistic
                solutions to hospitals, laboratories, and pharmaceutical industries.</p>
            </div>
            <div class="clearfix"></p>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <div class="section-title margin-bottom-40px">
          <div class="row justify-content-center">
              <div class="col-lg-7">
                  <div class="icon"><i class="fa fa-ravelry" style="color: green;"></i></div>
                  <br>
                  <div class="h2">Special Request</div>
                  </div>
              </div>
          </div>
      <!-- </div> -->

                <div class="contact-modal col-lg-12  sm-mb-45px">
                    <div class="background-main-color" style="border-radius: 10px;">
                        <div class="padding-30px">
                            <h3 class="padding-bottom-15px">Request Special Service</h3>
                            <form action="/special-service/create" id="serviceForm" method="POST">
                              @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="inputName44" name="fullname" 
                                            style="background-color: white" placeholder="Name" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="inputEmail44"
                                            style="background-color: white" name="email" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" style="background-color: white" class="form-control"
                                            id="inputName44" placeholder="phone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Select service</label>
                                        <select name="service" class="form-control" id="from-country">
                                            <option value="">--select--</option>
                                            <option value="ecommerce">Ecommerce Service</option>
                                            <option value="corporate">Corporate Courier</option>
                                            <option value="medical">Medical courier Service</option>
                                            <option value="batch deliver">Batch deliveries</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" style="background-color: white" class="form-control"
                                        id="exampleFormControlTextarea11" rows="3"></textarea>
                                </div>
                                <button type="submit" style="border: none" onclick="submitHandler()"
                                    class="btn-sm btn-lg background-dark text-white text-center  text-uppercase rounded-0 padding-15px">SEND
                                    REQUEST</button>
                            </form>
                        </div>
                    </div>
                </div>


        </div>
        <!-- // row -->

    </div>
    <!-- // container -->

</div>
<script type="text/javascript">
 const submitHandler = () => {
     //console.log('clicked')
     document.getElementById("serviceForm").submit();
 }
</script>

@endsection
