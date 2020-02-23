<?php

namespace jwwisniewski\Jigsaw\News\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'instance_id' => 'required|integer',
            'title' => 'required|min:3',
            'url' => 'nullable|min:3',
            'keywords' => 'nullable|min:3',
            'description' => 'nullable|min:3',
            'contents' => 'required',
        ];
    }
}
