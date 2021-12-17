<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistStoreRequest;
use App\Http\Requests\ArtistUpdateRequest;
use App\Models\Artist;
use App\Models\ArtistCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->orderBy ?? 'desc';
        $sortBy = $request->sortBy ?? 'id';
        $search = "";
        $artists = Artist::with(['categories','works'])->orderBy($sortBy,$orderBy)->paginate(2);

        if($orderBy === 'desc')
         $orderBy = 'asc';
        else
         $orderBy = 'desc';

                
        return view('admin.artist.index', [ 'artists' => $artists,
                                            'orderBy' => $orderBy,
                                            'sortBy' => $sortBy,
                                            'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.artist.create', ['list' => $cats] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistStoreRequest $request)
    {
        $data = $request->validated();
        
        
        $hasfile = $request->hasFile('image');
        if($hasfile){
           $file = $request->file('image');
           
           $path = null;

           try {
               $path = Storage::disk('public')->put('artists',$file);
           } catch (\Throwable $th) {
               return response()->json(['error'=>'true', 'message'=>'Dosya yükleme hatası']);
           }

           $artist = Artist::create([
               'name' => $data['name'],
               'content_az' => $data['content_az'],
               'content_en' => $data['content_en'],
               'status' =>$data['status'],
               'image' => $path
           ]);

           $id = $artist->id;
           foreach ($data['kategori'] as $kat) {
               ArtistCategory::create([
                   'artist_id' => $id,
                   'category_id' => $kat
               ]);
           }


           return redirect()->route('admin.ressamlar.index');


           

           
           //dump($file);
           //dump($file->getClientMimeType());
           //dump($file->getClientOriginalExtension()); 
           //dump($file->store('artists'));
           //dump(Storage::disk('public')->put('artists',$file));
           //dump($file->storeAs('artists','resim'.rand(10000,19999).'.'.$file->guessClientExtension() )  );
           //dump(Storage::putFileAs('artists',$file, 'resim'.rand(10000,19999).'.'.$file->guessClientExtension() ));
        }
        
        die;
        //dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $artist = Artist::with('categories')->whereKey($id)->first();

        return view('admin.artist.edit', ['list' => $cats, 'artist' => $artist] ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistUpdateRequest $request, $id)
    {
        $data = $request->validated();
        
        $artist = Artist::find($id);

        if(!$artist){
            $request->session()->flash('status-class', 'bg-danger');
            $request->session()->flash('status-title', 'Error!');
            $request->session()->flash('status', 'Böyle bir kayıt yok!');
            return redirect()->route('admin.ressamlar.index');
        }else{
            $hasfile = $request->hasFile('image');
            $path = null;
            if($hasfile){
                $file = $request->file('image');
                try {
                    $path = Storage::disk('public')->put('artists',$file) ;                  
                } catch (\Throwable $th) {
                    return response()->json(['error'=>'true', 'message'=>'Dosya yükleme hatası']);
                }

                Storage::delete($artist->image);
            }

            
            $artist->name = $data["name"] ;
            $artist->content_az = $data["content_az"] ;
            $artist->content_en = $data["content_en"] ;
            $artist->status = $data["status"] ;
            if($hasfile)  $artist->image = $path;
            $artist->save();


            $artist->categories()->delete();

            $id = $artist->id;
            foreach ($data['kategori'] as $kat) {
                ArtistCategory::create([
                    'artist_id' => $id,
                    'category_id' => $kat
                ]);
            }


            return redirect()->route('admin.ressamlar.index');

        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        if(!$artist){
            return response()->json(['error'=>'true', 'message'=>'Böyle bir kayıt bulunamadı']);
        }

        try {
            if(Storage::disk('public')->exists($artist->image)){
                Storage::disk('public')->delete($artist->image);
            }
        } catch (\Throwable $th) {
            return response()->json(['error'=>'true', 'message'=>'Resim Silinirken bir hata oluştu']);

        }

        $artist->delete();

        return response()->json(['error'=>'false', 'message'=>'Silme işlemi başarılı']);
        

    }
}
