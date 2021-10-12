@extends('layouts.app')
@section('title', 'Thêm mới sách')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới sách</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('coffees.store') }}" enctype="multipart/form-data" class="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label style="color:black">Tên</label><strong class="text-danger">*</strong>
                                    <input type="text" value="{{ $coffee->name }}"
                                           class="form-control @error('name') is-invalid  @enderror" name="name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                               <div class="form-group">
                                    <label style="color:black">Giá bán</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="text" value="{{ $coffee->price }}"
                                           class="form-control @error('price') is-invalid  @enderror" name="price">
                                    @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1" style="color:black">Ảnh</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                

                                <div class="form-group">
                                    <label style="color:black">Thể loại</label>
                                    <strong class="text-danger">*</strong>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                

                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <p style="color:red">Trường <strong class="text-danger" > * </strong style="color:red"> là trường bắt buộc!</p>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
