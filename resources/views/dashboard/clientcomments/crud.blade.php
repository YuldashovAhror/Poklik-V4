@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все Комментарии </h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Ответь</th>
                            <th scope="col">Хорошо</th>
                            <th scope="col" class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key=>$comment)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->discription }}</td>
                                <td>{!! $comment->answer_uz !!}</td>
                                <td>
                                    <form action="{{ route('clientcomment.update', $comment) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('put') }}
                                        <div class="row">
                                            <div class="col-md-1 mb-3">
                                                <div class="input-group" style="font-size: 15px">
                                                    <input type="checkbox" id="ok" name="ok" @if ($comment->ok != 0) checked @endif >
                                                </div>
                                            </div>
                                        </div>
                                        <div >
                                            <button class="btn btn-primary" type="submit">Сохранить</button>
                                        </div>
                                    </form>
                                    
                                </td>
                                <td class="text-center">
                                    <a href="{{route('clientcomment.edit', $comment)}}">
                                        <button class="btn btn-xs btn-success">
                                            Ответь
                                        </button>
                                    </a>
                                    <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $comment->id }}"><i class="bx bx-trash"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Удалить?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('clientcomment.destroy', $comment->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Да</button>
                                                    </form>
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
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
