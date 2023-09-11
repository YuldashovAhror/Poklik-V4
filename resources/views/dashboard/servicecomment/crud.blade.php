@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить Тип</h5>
                </div>
                <form action="{{ route('servicecomment.store') }}" method="post" enccomment="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="exampleFormControlInput1">Услуга</label>
                                <div class="mb-3">
                                    <select  class="calc__type" name="service"  id="calc__type" style="font-size: 26px">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service['name_' . $lang] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" required comment="text" name="name_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" required comment="text" name="name_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" required comment="text" name="name_en">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="discription_uz" class="form-label">Описание Uz</label>
                                <div class="form-group">
                                    <textarea class="ckeditor form-control" name="discription_uz"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="discription_ru">Описание Ru</label>
                                <textarea class="ckeditor form-control" name="discription_ru"></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="discription_en">Описание En</label>
                                <div class="input-group">
                                    <textarea class="ckeditor form-control" name="discription_en"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" comment="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все Тип</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Услуга</th>
                            <th scope="col" class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key=>$comment)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $comment->name_ru }}</td>
                                <td>{{ $comment->services->name_ru }}</td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-success" comment="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $comment->id }}Edit"><i class="bx bx-pencil"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $comment->id }}Edit" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50vw">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Изменить</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('servicecomment.update', $comment) }}" method="post" enccomment="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('put') }}
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="form-label" for="exampleFormControlInput1">Услуга</label>
                                                                    <div class="mb-3">
                                                                        <select  class="calc__type" name="service"  id="calc__type" style="font-size: 26px">
                                                                            @foreach ($services as $service)
                                                                                <option value="{{ $service->id }}">{{ $service['name_' . $lang] }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                                                        <input class="form-control" id="exampleFormControlInput1" comment="text" required name="name_ru" value="{{ $comment->name_ru }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                                                        <input class="form-control" id="exampleFormControlInput1" comment="text" required name="name_uz" value="{{ $comment->name_uz }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                                                        <input class="form-control" id="exampleFormControlInput1" comment="text" required name="name_en" value="{{ $comment->name_en }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="discription_uz" class="form-label">Описание Uz</label>
                                                                    <div class="form-group">
                                                                        <textarea class="ckeditor form-control" name="discription_uz">{{ $comment->discription_uz }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label" for="discription_ru">Описание Ru</label>
                                                                    <textarea class="ckeditor form-control" name="discription_ru">{{ $comment->discription_ru }}</textarea>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label" for="discription_en">Описание En</label>
                                                                    <div class="input-group">
                                                                        <textarea class="ckeditor form-control" name="discription_en">{{ $comment->discription_en }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="card-footer text-end">
                                                            <button class="btn btn-primary" comment="submit">Изменить</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-xs btn-danger" comment="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $comment->id }}"><i class="bx bx-trash"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Удалить?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('servicecomment.destroy', $comment->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button class="btn btn-primary" comment="submit" data-bs-original-title="" title="">Да</button>
                                                    </form>
                                                    <button class="btn btn-secondary" comment="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
