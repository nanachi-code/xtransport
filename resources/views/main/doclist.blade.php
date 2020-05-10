@extends('main.layouts.app')

@section('title',"Library")

@section('breadcrumb')
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
                                <span itemprop="title">Document List</span>
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
<section class="kopa-area-48">
    <div class="container">
        <div class="row">
            <div class="kopa-tab kopa-tab-9">
                <div class="col-xs-12 col-sm-3 no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="{{url('library/user/')}}"><i class="fa fa-user" aria-hidden="true"></i>My
                                Document</a></li>
                        <li><a href="{{url('library/bookmark/')}}"><i class="fa fa-star"
                                    aria-hidden="true"></i>Bookmarked</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Download</th>
                            <th scope="col">Release date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doc as $d)
                        <tr>
                            <th scope="row">{{$d->id}}</th>
                            <td>{{$d->title}}</td>
                            <td>{{$d->author}}</td>
                            <td>{{$d->download_number}}</td>
                            <td>{{$d->updated_at}}</td>
                            <td><a href="{{url("library/{$d->id}/detail")}}">View detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $doc->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection
