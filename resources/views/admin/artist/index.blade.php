@extends('admin.layouts.master')


    



@section('content')
    <div class="card card-body">
        <h3>Home Page !!!!</h3>
        @if ($artists)
            
            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th><a href="{{  request()->fullUrlWithQuery(['sortBy' => 'id' , 'orderBy'=> $orderBy ]) }}">#</a></th>
                        <th><a href="{{  request()->fullUrlWithQuery(['sortBy' => 'name' , 'orderBy'=> $orderBy ]) }}">Name</a></th>
                        <th>Category</th>
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
                            <td>
                                @if ($artist->status)
                                    <span class="badge light badge-success ">Aktif</span>
                                @else
                                    <span class="badge light badge-danger ">Pasif</span>
                                @endif 
                            </td>
                            <td> <button class="btn btn-sm btn-success">İncele</button> </td>
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



