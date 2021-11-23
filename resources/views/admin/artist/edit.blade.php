@extends('admin.layouts.master')


   


@section('content')
    <div class="card card-body">

        <h1>Kayıt Güncelle</h1> 
        <form action="{{ route('admin.ressamlar.update',['ressamlar'=>$artist->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-input-text name="name" head="Sanatçı Adı*" :value="$artist->name"   /><hr>
            <x-summer-note name="content_az" head="Özgeçmiş AZ" :value="$artist->content_az" /><hr>
            <x-summer-note name="content_en" head="Özgeçmiş EN" :value="$artist->content_en" /><hr>
            <x-aktif-pasif name="status" head="Durumu" :value="$artist->status"/><hr>
            <x-file-input name="image" head="Resim"/><hr>
            @if ($artist->image !='')
                <img src="{{ Storage::url($artist->image) }}" class="img-thumbnail" width="250" alt="" >
            @endif
            <hr>
            <x-input-select name="kategori[]" head="Sanatçı Adı*" :list="$list" :value="$artist->categories()->pluck('category_id')->implode(',')"   /><hr>
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