@extends('layout')

@section('title',"Contact")

@section('location')
    <section class="kopa__area kopa__area--noSpace">
        <div class="container">
            <div class="widget kopa__topPage style--01">
                <div class="kopa__topPage--left">
                    <div class="widget-title style--07 text--white">
                        <h3 class="primary__title">Contact us
                        </h3>
                    </div>
                    <!-- widget title-->
                    <div class="kopa__breadcrumb style--01"><span>You are here:</span><i class="fa fa-angle-double-right"></i><a href="{{url('/')}}">Home</a><i class="fa fa-angle-double-right"></i><span>Contact us</span></div>
                    <!-- breadcrumb-->
                    <div class="kopa__topPage__back text--white"><a href="#"><i class="fa fa-long-arrow-right"></i>back</a></div>
                    <!-- kopa topPage back-->
                </div>
                <!-- kopa topPage left-->
                <div class="kopa__topPage--right"><img src="{{asset('images/default/contact.jpg')}}" alt=""></div>
                <!-- kopa topPage right-->
            </div>
            <!-- kopa topPage-->
        </div>
        <!-- container-->
    </section>
    <!-- kopa-area-->
@endsection

@section('content')
    <!-- kopa-area-->
    <section class="kopa__area kopa__area--08">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="widget kopa__contact style--03">
                        <div class="widget-title style--08">
                            <h2 class="primary__title">Contact us</h2>
                            <div class="kopa__line--dotted style--02"><span class="kopa__line--dotted--small kopa__line--dotted--dark"></span><span class="kopa__line--dotted--small kopa__line--dotted--gray"></span><span class="kopa__line--dotted--small kopa__line--dotted--light"></span><span class="kopa__line--dotted--wide"></span></div>
                            <!-- kopa line dotted-->
                            <p class="text__title">Tagoking is one of the world's leading non-asset supply chain management companies,
                                and we design and deploy leading solutions in both freight management.
                                More than 42,000 dedicated employees work in 17 regional clusters.
                                Developed by 3 members Dinh Vu, Dao Ngoc Long and Ho Ly Thai. We are honored to serve you.</p>
                        </div>
                        <!-- widget title-->
                        <div class="widget-content">
                            <p><i class="fa fa-phone"></i>+84398698695</p>
                            <p> <i class="fa fa-envelope-o"></i>tagoking@t1904a.com</p>
                            <div class="kopa_formContact style--01">
                                <div class="wpcf7">
                                    <div class="screen-reader-response"></div>
                                    <form action="{{url("/contact/feedback")}}" method="post" class="wpcf7-form">
                                        @csrf
                                        <p><span class="wpcf7-form-control-wrap your-name">
                            <input type="text" name="name" placeholder="Name *" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"></span></p>
                                        <p><span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="email" placeholder="Email *" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"></span></p>
                                        <p><span class="wpcf7-form-control-wrap your-subject">
                            <input type="text" name="website_url" placeholder="Website url" class="wpcf7-form-control wpcf7-text"></span></p>
                                        <p><span class="wpcf7-form-control-wrap your-message">
                            <textarea placeholder="Comment" name="comment" class="wpcf7-form-control wpcf7-textarea"></textarea></span></p>
                                        <p>
                                            <button type="submit" id="contact-feedback" class="wpcf7-form-control wpcf7-submit btn btn--md btn--curve btn__color--primary">Send Feedback</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- kopa form contact-->
                        </div>
                        <!-- widget content-->
                    </div>
                    <!-- kopa contact-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d931.0241956440349!2d105.78173522916106!3d21.028813150912438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3285df81f%3A0x97be82a66bbe646b!2sDetech%20Building!5e0!3m2!1svi!2s!4v1587532938929!5m2!1svi!2s" width="600" height="800" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
                <!-- col-->
            </div>
            <!-- row-->
        </div>
        <!-- container-->
    </section>
@endsection
@section('script')
    <script type="text/javascript">
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
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                    setTimeout(() => {
                        form.find(".alert-dismissible").remove();
                    }, 3000);
                    console.log(res);
                },
                error: (e) => {
                    form.find(".alert-dismissible");
                    form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                    setTimeout(() => {
                        form.find(".alert-dismissible").remove();
                    }, 3000);
                    console.log(e.responseJSON);
                },
            });
        });
    </script>
@endsection
