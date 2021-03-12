@extends('site.layouts.site')
@section('content')
<div class="page-title con">
    <div class="container">
        <div class="padding-tb-150px">
            <!-- <h1><span>Contact Us</span></h1> -->

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
                    <div class="h2">Contact us</div>
                    <div class="des">Our services are designed to assist with prompt delivery of logistic solutions.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 sm-mb-45px">
                <p> The Coach Express (Coach) prides itself as being one of the best logistic companies in Nigeria. We
                    support all types of businesses: small, medium and multinationals with their logistic needs. </p>
                <h5>Phone :</h5>
                <span class="d-block"><i class="fa fa-phone text-main-color margin-right-10px"
                        aria-hidden="true"></i>08109192372</span>
                <span class="d-block sm-mb-30px"><i class="fa fa-phone text-main-color margin-right-10px"
                        aria-hidden="true"></i> 09064988466</span>
                <h5 class="margin-top-20px">Address :</h5>
                <span class="d-block sm-mb-30px"><i class="fa fa-map text-main-color margin-right-10px"
                        aria-hidden="true"></i> 15b Adedeji Adekola Street, Lekki Phase 1, Lagos </span>
                <h5 class="margin-top-20px">Email :</h5>
                <span class="d-block sm-mb-30px"><i class="fa fa-envelope-open text-main-color margin-right-10px"
                        aria-hidden="true"></i> info@thecoachexpress.com </span>
            </div>

            <div class="col-lg-6">
                <div class="contact-modal">
                    <div class="background-main-color" style="border-radius: 10px;">
                        <div class="padding-30px">
                            <h3 class="padding-bottom-15px">Contact Support</h3>
                            <form method="POST" id="contactForm" action="/contact">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" style="background-color: white;" class="form-control" name="fullname" 
                                            id="inputName44" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" style="background-color: white;" class="form-control" name="email" 
                                            id="inputEmail44" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea style="background-color: white;" class="form-control" name="message"
                                        id="exampleFormControlTextarea11" rows="3"></textarea>
                                </div>
                                <button type="submit" style="border-radius: 10px; border: none" onclick="submitForm()"
                                class="btn-sm btn-lg background-dark text-white text-center text-uppercase rounded-0 padding-15px">
                                SEND MESSAGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<script type="text/javascript">
 const submitForm = () => {
     //console.log('clicked')
     document.getElementById("contactForm").submit();
 }
</script>
@endsection
