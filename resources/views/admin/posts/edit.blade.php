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
                        <span class="mb-6">Редагувати тег</span>
                        <form action="{{ route('admin.post.update', $post->id) }}" method="post" class="w-50"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-50">
                                <input type="text" class="form-control" name="title" placeholder="Назва поста"
                                    id="title" value="{{ $post->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="from-group">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <div class="w-50">
                                    <img src="{{ url('storage/' . $post->image) }}">
                                </div>
                                <label for="exampleInputFile">Вставити фото</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Оберіть фото</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Встановить</span>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="from-group my-4">
                                <label for="category_id">Категорія</label>
                                <select class="form-select" aria-label="Default select example" id="category_id"
                                    name="category_id">
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="tag">Теги</label>
                                <select class="select2" multiple="multiple" data-placeholder="Виберіть теги"
                                    style="width: 100%;" name="tag_ids[]">
                                    @foreach ($tags as $tag)
            
                                    <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                           value="{{ $tag->id }}">{{ $tag->title }}</option>
                              
                                    @endforeach
                                </select>
                                @error('tag_ids')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="from-group">
                                <input type="submit" class="btn btn-primary" value="Змінити">
                            </div>
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
