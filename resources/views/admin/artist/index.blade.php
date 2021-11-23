@extends('admin.layouts.master')


    



@section('content')
    <div class="card card-body">
        <h3>Home Page !!!!</h3>
        <p> <a class="btn btn btn-rounded btn-info" href="{{ route('admin.ressamlar.create') }}"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info fa-xs"></i></span> Yeni Artist Ekle </a>  </p>
        @if ($artists)
            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th><a href="{{  request()->fullUrlWithQuery(['sortBy' => 'id' , 'orderBy'=> $orderBy ]) }}">#</a></th>
                        <th><a href="{{  request()->fullUrlWithQuery(['sortBy' => 'name' , 'orderBy'=> $orderBy ]) }}">Name</a></th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artists as $artist)
                        <tr>
                            <td>{{ $artist->id }}</td>
                            <td>{{ $artist->name }}</td>
                            <td>
                                @if ($artist->categories)
                                    @foreach ($artist->categories as $ac)
                                        {{ $ac->category->name }},
                                    @endforeach
                                @else
                                    <s>Kategori yok</s>
                                @endif
                            </td>
                            <td class="lightgallery">
                                @if ($artist->image)
                                <a href="{{ Storage::url($artist->image) }}" data-exthumbimage="{{ Storage::url($artist->image) }}" data-src="{{ Storage::url($artist->image) }}">
                                    <i class="fa fa-image"></i>
                                </a>
                                @endif
                                
                                
                            </td>
                            <td>
                                @if ($artist->status)
                                    <span class="badge light badge-success ">Aktif</span>
                                @else
                                    <span class="badge light badge-danger ">Pasif</span>
                                @endif 
                            </td>
                            <td> <a href="{{ route('admin.ressamlar.edit',['ressamlar'=>$artist->id]) }}" class="btn btn-sm btn-success">Edit</a> </td>
                        </tr>
                    @endforeach
    
                </tbody>
            </table>
            {{ $artists->appends( [ 'sortBy' => request()->query('sortBy'),
                                    'orderBy' => request()->query('orderBy')   ]  )->links()  }}
        
        @else
            <p>Kayıt yok!</p>
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

@endpush


@push('styles')
    <link href="/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
@endpush
