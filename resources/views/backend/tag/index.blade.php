@extends('layouts.backend') @section('title',$module.'list') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$module}} Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{$module}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List {{$module}}
             <a href="{{route($base_route.'create')}}" @class("btn btn-info")>Create</a>
             <a href="{{route($base_route.'trash')}}" @class("btn btn-danger")>Trash</a>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($data['records'] as $record)

                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$record->title}}</td>
                        <td>{{$record->slug}}</td>
                        <td>
                            @include('backend.includes.status',['status'=>$record->status])
                        </td>
                        <td>
                            {{$record->createdBy->name}}
                        </td>
                        <td>
                            @if(!empty($record->updated_by))
                            {{$record->updatedBy->name}}
                            @endif

                        </td>
                        {{-- <td>{{DB::table('users')->where('id', $d->created_by)->value('name')}}</td>
                        <td>{{DB::table('users')->where('id', $d->updated_by)->value('name')}}</td> --}}
                        <td>{{$record->created_at}}</td>
                        <th><a href="{{route($base_route.'show',$record->id)}}" class="btn btn-primary">ViewDetails</a>
                            <a href="{{route($base_route.'edit',$record->id)}} " class="btn btn-warning" style="display: inline-block">Edit</a>
                            <form action="{{route($base_route.'destroy',$record->id)}}" method="post" style="display:inline-block">
                                @method("delete")
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </th>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
