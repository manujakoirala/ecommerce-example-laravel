@extends('layouts.backend')
 @section('title',$module.'edit') @section('content')
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
            <h3 class="card-title">Update {{$module}}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <form action="{{route($base_route.'update',$data['record']->id)}}" method="post">
            @method("put")
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{$data['record']->title}}">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{$data['record']->slug}}">
                </div>
                <div class="form-group">

                    <label for="status">Status</label><br>
                    @if($data['record']->status==1)
                    <input type="radio" name="status" value="1" checked>Active<br>
                    <input type="radio" name="status" value="0">DeActive<br>
                    @else
                    <input type="radio" name="status" value="1">Active<br>
                    <input type="radio" name="status" value="0" checked>DeActive<br>
                    @endif
                </div>

                <input type="hidden" value="{{auth()->user()->id}}" name="created_by">


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" value="Update Tag">Update</button>
            </div>
        </form>

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
@section('js')
<script>
$("#title").keyup(function() {
  var Text = $(this).val();
  Text = Text.toLowerCase();
  Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
  $("#slug").val(Text);
});
</script>
@endsection
