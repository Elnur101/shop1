@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-primary btn-sm" href="{{route('admin.category.create')}}">
                        <i class="fas fa-plus">
                        </i>
                        Create
                    </a>
                </div>
                @if(session('success'))
                    <div class="alert alert-info">
                        <strong>{{session('success')}}</strong>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Категории</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            №
                        </th>
                        <th style="width: 15%">
                            Наименование
                        </th>
                        <th style="width: 65%">
                            Категории
                        </th>
                        <th style="width: 19%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
{{--                                <a href="">{{implode(', ', $category->children->pluck('name')->toArray())}}</a>--}}
                                @foreach($category->children as $children)
                                    <a href="">{{$children->name}},</a>
                                @endforeach
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('admin.category.edit', $category)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Нет категории</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
