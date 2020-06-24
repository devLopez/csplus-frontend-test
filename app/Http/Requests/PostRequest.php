<?php

namespace Spa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'title'      => 'required|max:50',
            'text'       => 'required|max:250',
            'user_id'    => 'required',
            'publish_at' => 'nullable|date',
        ];
    }
}
