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
                    <div class="col-6">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th class="text-center" colspan="2">Дія</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment -> id }}</td>
                                        <td>{{ $comment -> message }}</td>
                                        <td>    
                                            <a href="{{ route('personal.comment.edit', $comment->id) }}"><i class="bi bi-pencil fa-lg mx-3 text-success"></i></a>
                                        </td>
                                        <td>
                                            <form  action="{{ route('personal.liked.delete', $comment->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="bi bi-trash fa-lg mx-3 text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>
                        </div>
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
