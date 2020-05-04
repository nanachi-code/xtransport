@extends('layout')

@section('title',"Contact")

@section('location')
    <!-- kopa area 24-->
    <section class="kopa-area kopa-area-24 white-text-style">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="kopa-breadcrumb">
                        <h3>contact</h3>
                        <div class="breadcrumb-content">
                            <p>We offer a big storage space, heated and with air condition, to store
                                <br> your good’s safe and organized even for longer period of time.</p>
                            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
					                                <a itemprop="url" href="#">
					                                    <span itemprop="title">Home</span>
                                    </a>
                                    </span>
                            <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
					                                <a itemprop="url" class="current-page">
					                                    <span itemprop="title">contact</span>
                                    </a>
                                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
    <!-- kopa-area-->
@endsection

@section('content')
    <!-- kopa-area-->
    <!-- kopa area 40 -->
    <section class="kopa-area kopa-area-40">
        <div class="container">
            <div class="row ul-mh ct-row-02">
                <!-- wrap map -->
                <div class="col-xs-12 col-sm-6 ct-col-02 col-md-8  ">
                    <!-- widget -->
                        <!-- ======================== -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.092938382334!2d105.7796333142453!3d21.028966993148757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3285df81f%3A0x97be82a66bbe646b!2sDetech%20Building!5e0!3m2!1svi!2s!4v1588577870608!5m2!1svi!2s"
                                width="600" height="534" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        <!-- ======================= -->
                    <!-- end -->
                </div>
                <!-- wrap -->
                <div class="col-xs-12 col-sm-6 col-md-4 ct-col-02  white-text-style">
                    <div class="widget ex-module-contact-11">
                        <div class="widget-content">
                            <ul class="ul-mh">
                                <!-- ** -->
                                <li>
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <span class="ti-location-pin"></span>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">Office</h4>
                                            <p>Số 8 Tôn Thất Thuyết,
                                                <br> Mỹ Đình, Hà Nội</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li>
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <span class="ti-email"></span>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">email</h4>
                                            <p>Kopasoft@support.com</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li>
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <span class="ti-mobile"></span>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">phone</h4>
                                            <p>+84398698695</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li>
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <span class="ti-time"></span>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">openning hours</h4>
                                            <p>Mon - Sat 8.00 - 18.00</p>
                                            <p>Sunday CLOSED</p>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- wrap -->
                <div class="col-xs-12  ct-col-02 style-wrap-02">
                    <div class="widget ex-module-contact-12">
                        <header class="widget-header style-08">
                            <h3 class="widget-title ">Feedback Form</h3>
                            <span class="sub-title color-title-3">In our clinic we use only the high quality materials and the most modern methods and procedures. To accelerate the process of bleaching we use a special lamps which also make the bleaching more friendly to your teeth. You will be leaving our office with a nice bright smile.</span>
                        </header>
                        <div class="widget-content">
                            <article class="entry-item">
                                <div class="entry-content">
                                    <!--  ======================================== -->
                                    <form class="ct-form-1 form-style-1"  method="post" novalidate="novalidate" action="{{url("/contact/feedback")}}" id="contact-feedback">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <p class="input-block">
                                                    <label><span class="ti-user"></span>
                                                    </label>
                                                    <input type="text" placeholder="Name"  name="name" class="valid">
                                                </p>
                                                <p class="input-block">
                                                    <label><span class="ti-email"></span>
                                                    </label>
                                                    <input type="text" placeholder="Email" name="email" class="valid">
                                                </p>

                                            </div>
                                            <!-- col-md-6 -->

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <p class="textarea-block">
                                                    <textarea name="comment" placeholder="Your message" cols="88" rows="5"></textarea>
                                                </p>

                                            </div>
                                            <!-- col-md-6 -->

                                        </div>
                                        <!-- row -->

                                        <p class="input-block btn-block clearfix">
                                            <button  type="submit" id="contact-feedback" class="style-btn-01 md-btn">Seed Message</button>
                                        </p>

                                    </form>
                                    <!-- ============================================ -->
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#contact-feedback").submit(function (e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: (res) => {
                        form.find(".alert-dismissible").remove();
                        form.prepend(`
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                        setTimeout(() => {
                            form.find(".alert-dismissible").remove();
                        }, 5000);
                        console.log(res);
                    },
                    error: (e) => {
                        form.find(".alert-dismissible");
                        form.prepend(`
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                        setTimeout(() => {
                            form.find(".alert-dismissible").remove();
                        }, 5000);
                        console.log(e.responseJSON);
                    },
                });
            });
        });
    </script>
@endsection
