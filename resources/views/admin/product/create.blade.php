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
            <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                        <div class="col-md-6">
                            <div class="card card-primary">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Наименование</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Наименование">
                                        </div>
                                        @error('name')
                                            <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                        <div class="form-group">
                                            <label for="name">Цена</label>
                                            <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="Цена">
                                        </div>
                                        @error('price')
                                        <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                        <div class="form-group">
                                            <label for="stock">Количество</label>
                                            <input type="text" name="stock" class="form-control" value="{{old('stock')}}" placeholder="Количество">
                                        </div>
                                        @error('stock')
                                        <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                        <div class="form-group" id="summernote">
                                            <label>Описание</label>
                                            <textarea class="form-control" rows="3" name="description" placeholder="Описание ...">{{old('description')}}</textarea>
                                        </div>
                                        @error('description')
                                        <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                    </div>
{{--                                    <div class="card-footer">--}}
{{--                                        <button type="submit" class="btn btn-primary">Сохранить</button>--}}
{{--                                    </div>--}}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Категории</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">-- Нет категории --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                    {{$category->id == old("category_id" ? "selected" : '' )}}
                                                >{{$category->name}}</option>
                                                @include('admin.partials.option', ['children'=>$category->children, 'prefix'=>'--'])
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Брэнд</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="">-- Нет брэнда --</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}"
                                                {{$brand->id === old('brand_id') ? 'selected' : ''}}
                                                >{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Одно изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="cover">
                                                <label class="custom-file-label">Выбор изображения</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                        @error('cover')
                                        <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Много изображении</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image[]" multiple>
                                                <label class="custom-file-label">Выбор изображения</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                        @error('image')
                                            <strong style="color: #FF2D20">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>


                </div>
            </form>

        </div>
    </section>
@endsection

