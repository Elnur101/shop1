@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать категорию</h1>
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
                            <h3 class="card-title">Редактировать категорию</h3>
                        </div>
                        <form action="{{route('admin.category.update', $category)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Редактировать категорию</label>
                                    <input type="text" name="name" class="form-control" value="{{$category->name}}"
                                           placeholder="Наименование категории">
                                </div>
                                @error('name')
                        <strong style="color: #FF2D20">{{$message}}</strong>
                        @enderror
                        <div class="form-group">
                            <label>Название категории</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">-- Нет родителя --</option>
                                @foreach($categories as $categoryItem)
                                    <option value="{{$categoryItem->id ?? ''}}"
                                            @isset($category->id)
                                                @if($category->parent_id == $categoryItem->id)
                                                    selected=""
                                                @endif
                                                @if($category->id == $categoryItem->id)
                                                    disabled=""
                                                @endif
                                            @endisset
                                    >{{$categoryItem->name}}</option>
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

