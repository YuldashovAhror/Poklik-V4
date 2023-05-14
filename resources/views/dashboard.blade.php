@extends('layouts.dashboard.main')

@section('content')
    <textarea name="description1_en" class="ckeditor" rows="10" cols="80"></textarea>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection