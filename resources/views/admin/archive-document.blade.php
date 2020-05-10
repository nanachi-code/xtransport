@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/document/all') }}">All Documents</a>
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
                                <h3>Documents</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="table-admin-document" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Upload user</th>
                                        <th>Download number</th>
                                        <th>Bookmark number</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!isset($documents))
                                    <tr class="odd">
                                        <td valign="top" colspan="7" class="dataTables_empty"
                                            style="text-align: center">No data available in table
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->id }}</td>
                                        <td>{{ $document->title }}</td>
                                        <td>{{\App\User::find($document->user_id)->name}}</td>
                                        <td>{{ $document->download_number }}</td>
                                        <td>{{ $document->bookmark_number }}</td>
                                        @switch($document->status)
                                        @case(\App\Document::PUBLISH)
                                        <td>Published</td>
                                        @break
                                        @case(\App\Document::DELETED)
                                        <td>Deleted</td>
                                        @break
                                        @default <td>Pending</td>
                                        @endswitch
                                        <td class="row-actions">
                                            <a href="{{ url("/admin/document/{$document->id}")}}">
                                                <i class="os-icon os-icon-ui-49"></i>
                                            </a>
                                            <a href="{{ url("admin/document/{$document->id}/delete")}}"
                                                class="danger dt-delete">
                                                <i class="os-icon os-icon-ui-15"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Upload user</th>
                                        <th>Download number</th>
                                        <th>Bookmark number</th>
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

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/document.js") }}"></script>
@endsection
