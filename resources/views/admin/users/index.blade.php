@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Користувачі</h1>
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
                    <div class="col-2 mb-3">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary w-10">Створити</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-name">Список користувачів</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th class="text-center" colspan="3">Дія</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user -> id }}</td>
                                        <td>{{ $user -> name }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.show', $user->id) }}"><i class="bi bi-eye fa-lg mx-3"></i></a>
                                        </td>
                                        <td>    
                                            <a href="{{ route('admin.user.edit', $user->id) }}"><i class="bi bi-pencil fa-lg mx-3 text-success"></i></a>
                                        </td>
                                        <td>
                                            <form  action="{{ route('admin.user.delete', $user->id) }}" method="post">
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
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
