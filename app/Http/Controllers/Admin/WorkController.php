<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name_en' => 'required',
            'name_az' => 'required',
            'resim' => 'required|mimes:jpeg,png,gif,jpg',
            'status' => 'required',
            'artist_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>true , 'message' => $validator->errors()]);
        }

        $data = $validator->validated(); 
        $hasfile = $request->hasFile('resim');
        if($hasfile){
            $file = $request->file('resim');
            $path = null;
            try {
                $path = Storage::disk('public')->put('works',$file);
            } catch (\Throwable $th) {
                return response()->json(['error'=>'true', 'message'=>'Dosya yükleme hatası']);
            }

            $work = Work::create([
                'artist_id'=>  $data['artist_id'],
                'name_az'=>  $data['name_az'],
                'name_en'=>  $data['name_en'],
                'path' => $path,
                'status' => $data['status']
            ]);

            if($work){
                return response()->json([
                    'error' => false,
                    'message' => 'Kayıt İşlemi başarılı'
                ]);
            }


        }








       
        return response()->json(['error'=>true , 'message' => 'bu data kontrollerdan döndü']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
