<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'content_az' => 'required|min:15',
            'content_en' => 'required|min:15',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg',
            'image.*' => 'image|mimes:jpeg,png,gif,jpg',
        ];
    }
}
