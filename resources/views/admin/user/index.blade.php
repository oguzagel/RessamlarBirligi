@extends('admin.layouts.master')


    



@section('content')
    <div class="card card-body">
        <h3>Kullanıcı bilglileri</h3>
        <p>Adı : {{ $user->name }}</p>
        <p>Eposta Adresi : {{ $user->email }}</p>

        @if ( $user->image()->count() > 0 )
           <p>resim :  {{ $user->image->path }} </p> 
        @endif
    </div>    



@endsection


@push('scripts')
    
    <script src="/vendor/lightgallery/js/lightgallery-all.min.js"></script>
    <script>
        $('.lightgallery').lightGallery({
            loop:true,
            thumbnail:true,
            exThumbImage: 'data-exthumbimage'
        });
    </script>

<script src="/js/admin/helper.js"></script>


@endpush


@push('styles')
    <link href="/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
@endpush
