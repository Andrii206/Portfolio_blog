@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <span class="mb-6">Редагувати користувача</span>
                        <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="w-50">
                            @csrf
                            @method('PATCH')
                            <div class="from-group my-4">
                                <label for="role">Роль</label>    
                                <select class="form-select" aria-label="Default select example" name="role">
                                    @foreach($roles as $id => $role)
                                        <option 
                                        {{ $id == $user->role ? 'selected' : '' }}
                                        value="{{$id}}">{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="from-group w-50">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Назва категорії"
                                    id="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" id="email"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
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
