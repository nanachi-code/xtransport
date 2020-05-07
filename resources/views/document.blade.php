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
            {{-- <iframe src="https://view.officeapps.live.com/op/view.aspx?src=https://drive.google.com/open?id=1FcEhk-_IphE8aKrTpr_aojg5KRiBHPuQrbJHNQ9kKPY" frameborder="0"
            style="width:100%;min-height:640px;"></iframe> --}}
            @if (explode('.',$doc->file)[1] == 'pdf')
            <iframe src="{{$pathToFile}}" width="100%" height="100%"></iframe>
            @else <div class="alert alert-danger style-02 fade in">
                <div class="alert-body row">
                    <div class="alert-thumb">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div class="alert-content">
                        <h4 class="alert-title">Preview Error</h4>
                        <p>Preview not support for this type of file</p>
                    </div>
                </div>
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>
            </div>
            @endif
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Rating</h3>
                                            <input id="rate-view" type="text" class="rating" data-size="lg"
                                                value="{{ $doc->averageRating }}" name="rate" disabled>

                                        </div>
                                        <div class="col-md-6">
                                            <h3>Your Rating</h3>
                                            <form action="{{url('library/rate')}}" method="POST">
                                                @csrf

                                                <input id="input-id" type="text" class="rating" data-size="lg"
                                                    value="{{ $doc->userAverageRating }}" name="rate"
                                                    {{($rate_flag)? "":"disabled" }}>
                                                <input type="hidden" name="id" required="" value="{{ $doc->id }}">

                                                @if ($rate_flag)
                                                <div class="py-4">
                                                    <button class="btn btn-success">Submit Review</button>
                                                </div>
                                                @else
                                                <div class="py-4">
                                                    <button class="btn btn-success" disabled>Submit Review</button>
                                                </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
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
@section('additional-scripts')
<script type="text/javascript">
    $("#input-id").rating();
    $("#rate-view").rating();
</script>
@endsection
