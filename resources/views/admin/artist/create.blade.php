@extends('admin.layouts.master')


   


@section('content')
    <div class="card card-body">
        
        <h1>Yeni Kayıt</h1> 
        <form action="{{ route('admin.ressamlar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-input-text name="name" head="Sanatçı Adı*"  /><hr>
            <x-summer-note name="content_az" head="Özgeçmiş AZ" /><hr>
            <x-summer-note name="content_en" head="Özgeçmiş EN" /><hr>
            <x-aktif-pasif name="status" head="Durumu"/><hr>
            <x-file-input name="image" head="Resim"/><hr>
            <x-input-select name="kategori[]" head="Sanatçı Adı*" :list="$list"    /><hr>
            <button class="btn btn-success btn-sm" type="submit">Kaydet</button>
        </form>     
    </div>    
@endsection


@push('styles')
    <!-- Summernote -->
    <link href="/vendor/summernote/summernote.css" rel="stylesheet">
@endpush


@push('scripts')
    
    <!-- Summernote -->
    <script src="/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="/js/admin/plugins-init/summernote-init.js"></script>

@endpush