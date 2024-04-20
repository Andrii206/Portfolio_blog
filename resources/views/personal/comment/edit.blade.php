@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Коментарі</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('main.index')}}">Головна сторінка сайту</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <span class="mb-6">Редагувати категорію</span>
                        <form action="{{ route('personal.comment.update', $comment -> id) }}" method="post" class="w-50">
                            @csrf
                            @method('PATCH')
                            <div class="from-group">
                                <textarea class="from-control" name="message" cols="30" rows="10">{{ $comment->message }}</textarea>
                                @error('message')
                                    
                                @enderror 
                            </div>
                            <input type="submit" class="btn btn-primary" value="Змінити">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
