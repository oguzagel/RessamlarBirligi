@extends('admin.layouts.master')


   


@section('content')
    <div class="card card-body">
        <h1>Kayıt Güncelle</h1> 
        <div class="default-tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Genel Bilgi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#work"><i class="la la-user mr-2"></i> Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#images"><i class="la la-user mr-2"></i> Images</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <br>
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

                <div class="tab-pane fade show" id="work" role="tabpanel">
                    <table class="table table-responsive-md workstable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name az</th>
                                <th>Name en</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if ($artist->works()->count()>0)

                            @foreach ($artist->works as $work)
                                <tr>
                                    <td>{{ $work->id }}</td>
                                    <td>{{ $work->name_az }}</td>
                                    <td>{{ $work->name_en }}</td>
                                    <td class="lightgallery">
                                        
                                        <a href="{{ Storage::url($work->path) }}" data-exthumbimage="{{ Storage::url($work->path) }}" data-src="{{ Storage::url($work->path)}}">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        
                                        
                                        
                                    </td>
                                    <td>
                                        @if ($work->status)
                                            <span class="badge light badge-success ">Aktif</span>
                                        @else
                                            <span class="badge light badge-danger ">Pasif</span>
                                        @endif 
                                    </td>
                                    <td> <button wid="{{ $work->id }}" class="btn btn-sm btn-success deletework">Sil</button> </td>
                                </tr>
                            @endforeach
                           
                        @endif
                        </tbody>
                    </table>

                   
                    
                    
                    <form action="{{ route('admin.works.store') }}" method="POST" id="workform" enctype="multipart/form-data">
                        @csrf
                        <x-input-text name="name_az" head="Eser Adı (AZ)"/><hr>
                        <x-input-text name="name_en" head="Eser Adı (EN)"  /><hr>
                        <x-aktif-pasif name="status" head="Durumu" /><hr>
                        <x-file-input name="resim" head="Resim"/>
                        <x-progress-bar progressid="pbar" /><hr>
                        

                        <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                        <button class="btn btn-success btn-sm" type="submit">Kaydet</button>

                    </form>



                </div>

                <div class="tab-pane fade show" id="images" role="tabpanel">
                    
                    <table class="table table-responsive-md workstable">
                        <thead>
                            <th>#</th>
                            <th>Path</th>
                            <th>-</th>
                        </thead>
                        <tbody>
                            @if ($artist->images()->count()>0)
                                @foreach ($artist->images as $resim)
                                   <tr>
                                    <td>{{ $resim->id }}</td>
                                    <td>{{ $resim->path }}</td>
                                    <td><button>Sil</button></td>
                                   </tr>
                                @endforeach
                            @endif
                        </tbody>
                    
                    </table>

                    
                    
                    <form action="{{ route('admin.ressamlar.storeImage',['id'=>$artist->id]) }}" method="POST" id="workform" enctype="multipart/form-data">
                        @csrf
                        <x-input-image-file name="resim"/>

                        <button class="btn btn-success btn-sm" type="submit">Kaydet</button>

                    </form>




                </div>
            
            </div>
        
        </div>


        
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

    <script>
        var route_prefix = "/filemanager";       

    </script>
    <script src="/js/admin/helper.js"></script>

    <script>
         $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>



@endpush