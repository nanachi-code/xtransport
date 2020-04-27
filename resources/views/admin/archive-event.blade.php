@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/event/all') }}">All events</a>
    </li>
</ul>
{{-- END - Breadcrumbs --}}

{{-- START - Content --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3>Event</h3>
                            </div>
                            <div class="float-right">
                                <a class="btn-outline-primary btn" href="{{ url('admin/event/new') }}">New</a>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="table-admin-event" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->address }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>
                                            @if ($event->status == "active")
                                            Active
                                            @elseif($event->status == "disable")
                                            Disabled
                                            @endif
                                        </td>
                                        <td class="row-actions">
                                            <a href="{{ url("/admin/event/{$event->id}")}}">
                                                <i class="os-icon os-icon-ui-49"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection
