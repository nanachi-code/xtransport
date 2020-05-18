@extends('main.layouts.app')

@section('title', "Project Archives")

@section('breadcrumb')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>Projects</h3>
                    <div class="breadcrumb-content">
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{ url('/') }}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">Projects</span>
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
<!-- kopa area 36 -->
<section class="kopa-area kopa-area-36">
    <div class="container">
        <div class="row">
            <!-- main col -->
            <div class="col-xs-12 col-md-12 main-col">
                @if (count($projects) >0)
                @foreach ($projects as $project)
                <div class="project-item">
                    <div class="row p-5">
                        <div class="col-md-3">
                            <a href="{{ url("project/detail/{$project->id}") }}">
                                <img src="{{ asset("/uploads/{$project->thumbnail}") }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <div class="project-title">
                                <h4>
                                    <a href="">{{ $project->name }}</a>
                                </h4>
                            </div>
                            <div class="project-excerpt">
                                <p>{{ $project->excerpt }}</p>
                            </div>
                            <div class="project-read-more mt-4">
                                <a href="{{ url("project/detail/{$project->id}") }}" class="kopa-btn btn-02">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $projects->links('main.subviews.paginate') }}
                @else
                <h6>No projects found.</h6>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- end kopa area 36 -->
@endsection
