@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создать категорию</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Категории товара</h3>
                        </div>
                        <form action="{{route('admin.category.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Категория товара</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Наименование категории">
                                </div>
                                @error('name')
                                    <strong style="color: #FF2D20">{{$message}}</strong>
                                @enderror
                                <div class="form-group">
                                    <label>Название категории</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="0">-- Нет родителя --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @include('admin.category.partials.option', ['children'=>$category->children, 'prefix'=>'-'])
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
@endsection

