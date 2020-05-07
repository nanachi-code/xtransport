@extends('layout')

@section('title',"Library")

@section('location')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>Document</h3>
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
                                <span itemprop="title">Document</span>
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="widget-title kopa-heading2 size-normal pt-5">{{$doc->title}}</h3>
            {{-- <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{$pathToFile}}" frameborder="0"
            style="width:100%;min-height:640px;"></iframe> --}}
            <iframe src="{{$pathToFile}}" width="100%" height="100%"></iframe>
            <div class="py-4"></div>

            <div class="widget-content pb-5">
                <div class="kopa-tab kopa-tab-7">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="tab" href=".tab-content-9">Mô tả</a>
                        </li>
                        <li><a data-toggle="tab" href=".tab-content-10">Tải về</a>
                        </li>
                        <li><a data-toggle="tab" href=".tab-content-11">Đánh giá</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active tab-content-9">
                            <article class="entry-item clearfix">
                                <div class="entry-content">
                                    <p>{{$doc->summary}}</p>
                                </div>
                            </article>
                        </div>
                        <div class="tab-pane fade tab-content-10">
                            <article class="entry-item clearfix">
                                <div class="entry-content">
                                    <a class="style-btn-01 lg-btn with-icon-style-01"
                                        href="{{url('library/download/'.$doc->id)}}"><i class="fa fa-download"></i>Tải
                                        về</a>
                                </div>
                            </article>
                        </div>
                        <div class="tab-pane fade tab-content-11">
                            <article class="entry-item clearfix">

                                <div class="entry-content">
                                    <p></p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
