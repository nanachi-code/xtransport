@extends('admin.layouts.app')

@section('content')
{{-- START - Content --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                {{-- START - Grid of tablo statistics --}}
                <div class="element-wrapper">
                    <h3 class="element-header">
                        Statistics
                    </h3>
                    <div class="element-content">
                        <div class="tablo-with-chart">
                            <div class="row">
                                <div class="col-sm-5 col-xxl-4">
                                    <div class="tablos">
                                        <div class="row mb-xl-2 mb-xxl-3">
                                            {{-- New comments --}}
                                            <div class="col-sm-6">
                                                <a class="element-box el-tablo centered trend-in-corner padded bold-label"
                                                    href="{{ url("admin/comment") }}">
                                                    <div class="value">
                                                        {{ $countTodayComments }}
                                                    </div>
                                                    <div class="label">
                                                        New comments
                                                    </div>

                                                    @if ($countTodayComments > $countYesterdayComments)
                                                    <div class="trending trending-up-basic">
                                                        <i class="os-icon os-icon-arrow-up2"></i>
                                                    </div>
                                                    @elseif ($countTodayComments == $countYesterdayComments)
                                                    @else
                                                    <div class="trending trending-down-basic">
                                                        <i class="os-icon os-icon-arrow-down"></i>
                                                    </div>
                                                    @endif
                                                </a>
                                            </div>
                                            {{-- New posts --}}
                                            <div class="col-sm-6">
                                                <a class="element-box el-tablo centered trend-in-corner padded bold-label"
                                                    href="{{ url("admin/post/all") }}">
                                                    <div class="value">
                                                        {{ $countTodayPosts }}
                                                    </div>
                                                    <div class="label">
                                                        New posts
                                                    </div>

                                                    @if ($countTodayPosts > $countYesterdayPosts)
                                                    <div class="trending trending-up-basic">
                                                        <i class="os-icon os-icon-arrow-up2"></i>
                                                    </div>
                                                    @elseif ($countTodayPosts == $countYesterdayPosts)
                                                    @else
                                                    <div class="trending trending-down-basic">
                                                        <i class="os-icon os-icon-arrow-down"></i>
                                                    </div>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- New users --}}
                                            <div class="col-sm-6">
                                                <a class="element-box el-tablo centered trend-in-corner padded bold-label"
                                                    href="{{ url("admin/user/all") }}">
                                                    <div class="value">
                                                        {{ $countTodayUsers }}
                                                    </div>
                                                    <div class="label">
                                                        New users
                                                    </div>
                                                    @if ($countTodayUsers > $countYesterdayUsers)
                                                    <div class="trending trending-up-basic">
                                                        <i class="os-icon os-icon-arrow-up2"></i>
                                                    </div>
                                                    @elseif ($countTodayUsers == $countYesterdayUsers)
                                                    @else
                                                    <div class="trending trending-down-basic">
                                                        <i class="os-icon os-icon-arrow-down"></i>
                                                    </div>
                                                    @endif
                                                </a>
                                            </div>
                                            {{-- New feedback --}}
                                            <div class="col-sm-6">
                                                <a class="element-box el-tablo centered trend-in-corner padded bold-label"
                                                    href="{{ url("admin/feedback/all") }}">
                                                    <div class="value">
                                                        {{ $countTodayFeedback }}
                                                    </div>
                                                    <div class="label">
                                                        New Feedback
                                                    </div>
                                                    @if ($countTodayFeedback > $countYesterdayFeedback)
                                                    <div class="trending trending-up-basic">
                                                        <i class="os-icon os-icon-arrow-up2"></i>
                                                    </div>
                                                    @elseif ($countTodayFeedback == $countYesterdayFeedback)
                                                    @else
                                                    <div class="trending trending-down-basic">
                                                        <i class="os-icon os-icon-arrow-down"></i>
                                                    </div>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 col-xxl-8">
                                    <!--START - Chart Box-->
                                    <div class="element-box pl-xxl-5 pr-xxl-5">
                                        <div class="el-tablo bigger highlight bold-label">
                                            <div class="value">
                                                12,537
                                            </div>
                                            <div class="label">
                                                Unique
                                                Visitors
                                            </div>
                                        </div>
                                        <div class="el-chart-w">
                                            <canvas height="170px" id="lineChart" width="600px"></canvas>
                                        </div>
                                    </div>
                                    <!--END - Chart Box-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END - Grid of tablo statistics --}}
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-sm-12">
                {{-- START - Today comments --}}
                <div class="element-wrapper">
                    <h3 class="element-header">
                        Today comments
                    </h3>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table class="table table-lightborder" id="dashboard-today-comments">
                                <thead>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Comment
                                        </th>
                                        <th>
                                            Last update
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todayComments as $comment)
                                    <tr>
                                        <td>
                                            {{ $comment->user }}
                                        </td>
                                        <td class="text-center">
                                            {{ $comment->content }}
                                        </td>
                                        <td class="text-center">
                                            {{ $comment->updated_at }}
                                        </td>
                                        <td class="row-actions">
                                            <a href="{{ url("admin/comment/{$comment->id}/delete")}}"
                                                class="danger dt-delete">
                                                <i class="os-icon os-icon-ui-15"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Comment
                                        </th>
                                        <th>
                                            Last update
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- END - Today comments --}}
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/dashboard.js") }}"></script>
@endsection
