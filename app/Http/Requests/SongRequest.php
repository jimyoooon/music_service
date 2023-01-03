<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'song.name' => 'required|string|max:100',
            'song.background' => 'required|string|max:1000',
            'song.overview' => 'required|string|max:1000',
            'movie' => 'required',

            //
        ];
    }
}
