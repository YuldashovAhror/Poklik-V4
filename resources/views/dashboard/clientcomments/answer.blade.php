@extends('layouts.dashboard.main')
@section('content')

<form action="{{ route('clientcomment.update', $comment) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-4">
            <label for="discription_uz" class="form-label">Описание Uz</label>
            <div class="form-group">
                <textarea class="ckeditor form-control" name="answer_uz">{{$comment->answer_uz}}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="discription_ru">Описание Ru</label>
            <textarea class="ckeditor form-control" name="answer_ru">{{$comment->answer_ru}}</textarea>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label" for="discription_en">Описание En</label>
            <div class="input-group">
                <textarea class="ckeditor form-control" name="answer_en">{{$comment->answer_en}}</textarea>
            </div>
        </div>
        <div class="row">
            <label for="">Разрешение</label>
            <div class="col-md-1 mb-3">
                <div class="input-group" style="font-size: 15px">
                    <input type="checkbox" id="ok" name="ok" @if ($comment->ok != 0) checked @endif >
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>

@endsection