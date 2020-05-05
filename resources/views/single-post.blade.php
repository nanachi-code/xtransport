@extends('layout')

@section('title',"Post")

@section('location')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>{{$post->title}}</h3>
                <div class="breadcrumb-content">
                    <p>{{ $post->excerpt }}}</p>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{url('/')}}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{url('/blog')}}">
                            <span itemprop="title">Blog</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">{{$post->title}}</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="kopa-area-48">
    <div class="container">
        <div class="row">
            <!-- main col -->
            <div class="col-xs-12 col-md-9 main-col">
                <div class="kopa-wrap-entry-item">
                    <article class="entry-item">
                        <header class="entry-header">
                            <h4 class="entry-title">{{$post->title}}</h4>
                            <div class="entry-meta">
                                <div class="d-inline mr-3">
                                    <i class="fa fa-user"></i>
                                    by <span class="entry-author">{{ $post->user->name }}</span>
                                </div>
                                <div class="d-inline mr-3">
                                    <span class="enry-date">{{ $post->updated_at }}</span>
                                </div>
                                <div class="d-inline mr-3">
                                    <span>{{ count($post->comments) }} <i class="fa fa-comment-o"></i></span>
                                </div>
                            </div>
                        </header>
                        <div class="entry-thumb">
                            <div class="entry-thumb embed-responsive embed-responsive-16by9">
                                <img src="{{asset('uploads/'.$post->thumbnail)}}" alt="">
                            </div>
                        </div>
                        <div class="entry-content">
                            {!! $post->content !!}
                        </div>
                        <footer class="entry-footer clearfix">
                            <div class="wrap-social-link alignright">
                                Share:
                                <ul class="">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                    </article>
                </div>
                <!-- comment list -->
                <div class="kopa-comment-list kopa-comment-list-1">
                    <div class="comments">
                        <h5 class="item-title style-01 bold-txt">
                            {{ count($post->comments) }} comment on “{{ $post->title }}”
                        </h5>
                        <ol class="comments-list">
                            @if ($post->hasComments())
                            @foreach ($post->comments as $comment)
                            @if (!$comment->hasParents())
                            <li class="comment">
                                <article>
                                    <header class="comment-header clearfix">
                                        <div class="comment-avatar alignleft">
                                            <a href="#">
                                                <img alt="" src="{{ url("uploads/{$comment->user->avatar}") }}">
                                            </a>
                                        </div>
                                        <div class="comment-info clearfix">
                                            <div class="alignleft">
                                                <h6><a href="#">{{ $comment->user->name }}</a></h6>
                                                <div class="entry-meta style-02">
                                                    <p class="entry-date">
                                                        <i class="fa fa-pencil"></i> {{ $comment->updated_at }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="alignright">
                                                <div class="comment-button">
                                                    <a href="#" data-id="{{ $comment->id }}">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="comment-content">
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </article>
                                <ul class="children">
                                    @if ($comment->hasChildren())
                                    @foreach ($comment->children as $childComment)
                                    <li class="comment">
                                        <article>
                                            <header class="comment-header clearfix">
                                                <div class="comment-avatar alignleft">
                                                    <a href="#">
                                                        <img alt=""
                                                            src="{{ url("uploads/{$childComment->user->avatar}") }}">
                                                    </a>
                                                </div>
                                                <div class="comment-info clearfix">
                                                    <div class="alignleft">
                                                        <h6><a href="#">{{ $childComment->user->name }}</a></h6>
                                                        <div class="entry-meta style-02">
                                                            <p class="entry-date">
                                                                <i class="fa fa-pencil"></i>
                                                                {{ $childComment->updated_at }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="comment-content">
                                                <p>{{ $childComment->content }}</p>
                                            </div>
                                        </article>
                                    </li>
                                    @endforeach
                                    @endif

                                    <li class="comment reply-comment d-none" data-id="{{ $comment->id }}">
                                        @if (Auth::check())
                                        <!-- ================= form ==================== -->
                                        <form class="form-comment" action="{{ url("post/{$post->id}/comment") }}"
                                            method="post" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <textarea name="content" placeholder="Add your comment here..." rows="3"
                                                    class="form-control"></textarea>
                                            </div>
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <input type="submit" value="Post comment" class="btn btn-black">
                                        </form>

                                        <!-- ================= end form ================= -->
                                        @else
                                        <p>You need to <a href="{{ url("login") }}">login</a> before posting comments.
                                        </p>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            @else
                            No comments found.
                            @endif
                        </ol>
                        <!--comments-list-->
                    </div>
                </div>
                <!-- end comment list -->
                <!-- form -->
                <div class="widget ex-module-contact-14">
                    <h3 class="widget-title kopa-title-9 bold-txt">Leave a reply</h3>
                    <div class="widget-content">
                        @if (Auth::check())
                        <!-- ================= form ==================== -->
                        <form class="form-comment ct-form-1 clearfix form-style-5"
                            action="{{ url("post/{$post->id}/comment") }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <p class="textarea-block">
                                        <textarea name="content" placeholder="Add your comment here..." cols="88"
                                            rows="5"></textarea>
                                    </p>
                                </div>
                                <!-- col-md-12 -->

                            </div>
                            <!-- row -->

                            <p class="input-block btn-block clearfix">
                                <input type="submit" value="Post comment" class="ct-submit-1">
                            </p>

                        </form>

                        <!-- ================= end form ================= -->
                        @else
                        <p>You need to <a href="{{ url("login") }}">login</a> before posting comments.</p>
                        @endif
                    </div>
                </div>
                <!-- end form -->

                <!-- widget -->
                <div class="widget ex-module-article-1">
                    <h3 class="widget-title kopa-title-9 bold-txt">related blogs</h3>
                    <div class="widget-content clearfix">
                        <ul class=" ul-mh row">
                            @foreach ($related_post as $r)
                            <li class="col-xs-12 col-sm-6" style="height: 577px;">
                                <article class="entry-item">
                                    <figure class="entry-thumb">
                                        <a href="#"><img src="{{asset('uploads/'.$r->thumbnail)}}" alt="">
                                        </a>
                                    </figure>
                                    <div class="entry-content">
                                        <div class="entry-meta clearfix">
                                            <figure class="auth-thumb">
                                                <img src="http://placehold.it/47x47" alt="">
                                            </figure>
                                            <div class="entry-info">
                                                <p class="auth-name"><a href="#">Peter Hofstee</a>
                                                </p>
                                                <p class="entry-date">Friday, August 7, 2015</p>
                                            </div>
                                        </div>
                                        <h4 class="entry-title"><a href="{{url('post/'.$r->id)}}">{{$r->title}}</a></h4>
                                        <p>Integer ac massa vehicula, viverra augue et, auctor urna. Morbi nec enim et
                                            odio blandit tempor vitae sit amet est. Aenean non fringilla lacus, vitae
                                            acumsan risus. Fusce lectus nibh,dapibus in consequat...</p>
                                        <footer class="entry-footer clearfix">
                                            <div class="alignleft">
                                                <p><span>35<i class="fa fa-comment-o"></i></span>
                                                </p>
                                            </div>
                                            <div class="alignright">
                                                <div class="wrap-btn">
                                                    <a href="{{url('post/'.$r->id)}}"><i class="fa fa-file-text-o"></i>
                                                        Read more</a>
                                                </div>
                                            </div>
                                        </footer>
                                    </div>
                                </article>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- end -->
            </div>
            <!-- end main col -->
            <!-- sidebar -->
            <div class="col-xs-12 col-md-3 sidebar kopa-col-respon-2">
                <div class="row ct-row-06">
                    <div class="col-xs-12 kopa-col-respon-1 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
                        <!-- widget -->
                        <div class="widget ex-module-slider-9">
                            <div class="widget-content">
                                <div class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 1578px; left: 0px; display: block;">
                                            <div class="owl-item" style="width: 263px;">
                                                <article class="entry-item">
                                                    <figure class="entry-thumb">
                                                        <img src="http://placehold.it/270x286" alt="">
                                                    </figure>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="#">face the<br>
                                                                challenges<br>
                                                                of chain<br>
                                                                complexity</a>
                                                        </h4>
                                                        <p>friday, august 7, 2015</p>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 263px;">
                                                <article class="entry-item">
                                                    <figure class="entry-thumb">
                                                        <img src="http://placehold.it/270x286" alt="">
                                                    </figure>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="#">face the<br>
                                                                challenges<br>
                                                                of chain<br>
                                                                complexity</a>
                                                        </h4>
                                                        <p>friday, august 7, 2015</p>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 263px;">
                                                <article class="entry-item">
                                                    <figure class="entry-thumb">
                                                        <img src="http://placehold.it/270x286" alt="">
                                                    </figure>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="#">face the<br>
                                                                challenges<br>
                                                                of chain<br>
                                                                complexity</a>
                                                        </h4>
                                                        <p>friday, august 7, 2015</p>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- navigation btn slisder -->
                                <div class="customNavigation">
                                    <a class="btn prev btn-prev-slider9"><i class="fa fa-angle-left"></i></a>
                                    <a class="btn next btn-next-slider9"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    <div class="col-xs-12">
                        <!-- widget -->
                        <div class="widget ex-module-contact-9 widget_search">
                            <header class="widget-header style-09">
                                <h3 class="widget-title"><span>subcribe</span></h3>
                                <span class="sub-title">Follow my lastest news</span>
                            </header>
                            <div class="widget-content">
                                <div class="ct-form-box newsleter-form-box">
                                    <form action="processForm.php" method="post" novalidate="novalidate"
                                        class="ct-form-3">
                                        <p class="input-block input-email clearfix">
                                            <input type="text" value="Your email"
                                                onfocus="if(this.value=='Your email')this.value='';"
                                                onblur="if(this.value=='')this.value='Your email';" name="email"
                                                class="valid">
                                            <button type="submit"><i class="fa fa-envelope"></i>
                                            </button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    <div class="col-xs-12">
                        <!-- widget -->
                        <div class="widget ex-module-article-list-1">
                            <header class="widget-header style-09">
                                <h3 class="widget-title"><span>popular post</span></h3>
                            </header>
                            <div class="widget-content">
                                <ul class=" ul-mh">
                                    <!-- ** -->
                                    <li style="">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/60x60" alt="">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="#">Shipping cargo<br> across the
                                                        ocean</a></h4>
                                                <div class="entry-meta">
                                                    <p class="entry-date">
                                                        july 5, 2015
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    <!-- ** -->
                                    <li style="">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/60x60" alt="">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="#">Why Community Management Is
                                                        Different From Social Media</a></h4>
                                                <div class="entry-meta">
                                                    <p class="entry-date">
                                                        july 5, 2015
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    <!-- ** -->
                                    <li style="">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/60x60" alt="">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="#">Be Succesful With Your Social Media
                                                        Marketing Strategy</a></h4>
                                                <div class="entry-meta">
                                                    <p class="entry-date">
                                                        july 5, 2015
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
            <!-- end side bar -->
        </div>
    </div>
</section>
@endsection

@section('additional-scripts')
<script>
    $(function(){
        $(".form-comment").on("submit", function (e) {
            e.preventDefault();

            let form = $(this);
            $.ajax({
                type: form.attr("method"),
                url: form.attr("action"),
                data: form.serialize(),
                dataType: "JSON",
                success: (res)=> {
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
                    }, 3000);
                    form.trigger("reset");

                    if (form.parent().hasClass("reply-comment")) {
                        $(`
                            <li class="comment">
                                <article>
                                    <header class="comment-header clearfix">
                                        <div class="comment-avatar alignleft">
                                            <a href="#">
                                                <img alt="" src="${res.comment.user.avatar}">
                                            </a>
                                        </div>
                                        <div class="comment-info clearfix">
                                            <div class="alignleft">
                                                <h6><a href="#">${res.comment.user.name}</a></h6>
                                                <div class="entry-meta style-02">
                                                    <p class="entry-date">
                                                        <i class="fa fa-pencil"></i>
                                                        ${res.comment.updated_at}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="comment-content">
                                        <p>${res.comment.content}</p>
                                    </div>
                                </article>
                            </li>
                        `).insertBefore(form.parent())
                    } else {
                        if (!$("li.comment").length) {
                            $(".comments-list").html("");
                        }
                        $(".comments-list").append(`
                            <li class="comment">
                                <article>
                                    <header class="comment-header clearfix">
                                        <div class="comment-avatar alignleft">
                                            <a href="#">
                                                <img alt="" src="${res.comment.user.avatar}">
                                            </a>
                                        </div>
                                        <div class="comment-info clearfix">
                                            <div class="alignleft">
                                                <h6><a href="#">${res.comment.user.name}</a></h6>
                                                <div class="entry-meta style-02">
                                                    <p class="entry-date">
                                                        <i class="fa fa-pencil"></i>
                                                        ${res.comment.updated_at}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="alignright">
                                                <div class="comment-button">
                                                    <a href="#" data-id="${res.comment.id}">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="comment-content">
                                        <p>${res.comment.content}</p>
                                    </div>
                                </article>
                                <ul class="children">
                                    <li class="comment reply-comment d-none" data-id="${res.comment.id}">
                                        <form class="form-comment" action="${res.comment.action}" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <textarea name="content" placeholder="Add your comment here..." rows="3"
                                                    class="form-control"></textarea>
                                            </div>
                                            <input type="hidden" name="parent_id" value="${res.comment.id}">
                                            <input type="submit" value="Post comment" class="btn btn-black">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        `)
                    }

                    console.log(res);
                }
            });
        })

        $(document).on("click", ".comment-button a", function (e) {
            e.preventDefault();
            let id = $(this).attr("data-id"),
                target = $(`.reply-comment[data-id=${id}]`);

            if (target.hasClass("d-none")) {
                target.removeClass("d-none");
            } else {
                target.addClass("d-none");
            }
        });
    })
</script>

@endsection