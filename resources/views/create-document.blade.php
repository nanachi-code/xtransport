@extends('layout')

@section('title',"Library")

@section('location')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>Library</h3>
                    <div class="breadcrumb-content">
                        <p>We offer a big storage space, heated and with air condition, to store
                            <br> your good’s safe and organized even for longer period of time.</p>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{url('/')}}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{url('/library')}}">
                                <span itemprop="title">Library</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">New document</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container widget">
    <div class="row">
        <div class="col-xs-12  ct-col-02 style-wrap-02" style="">
            <div class="widget ex-module-contact-12">
                <header class="widget-header style-08">
                    <h3 class="widget-title ">Upload Form</h3>
                </header>
                <div class="widget-content">
                    <article class="entry-item">
                        <div class="entry-content">
                            <!--  ======================================== -->
                            <form class="ct-form-1 form-style-1" method="post" action="{{url("/library/new")}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <p class="input-block">
                                        <label><span class="ti-email"></span>
                                        </label>
                                        <input type="text" placeholder="Title" name="title" class="valid">
                                    </p>
                                    <p class="input-block">
                                        <label><span class="ti-user"></span>
                                        </label>
                                        <input type="text" placeholder="Author" name="author" class="valid">
                                    </p>
                                    <p class="input-block ">
                                        <input type="file" class="form-control-file" name="file" class="valid">
                                    </p>
                                    <p class="textarea-block">
                                        <textarea name="summary" placeholder="Summary" cols="88" rows="5"></textarea>
                                    </p>
                                    <!-- col-md-6 -->
                                </div>
                                <!-- row -->

                                <p class="input-block btn-block clearfix">
                                    <button type="submit" id="contact-feedback"
                                        class="style-btn-01 md-btn">Upload</button>
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
@endsection
