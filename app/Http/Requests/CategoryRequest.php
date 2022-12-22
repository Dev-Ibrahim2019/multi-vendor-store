<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this ->route('category')) {
            return Gate::allows('category.update');
        }
        return Gate::allows('category.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('category');
        return Category::rules($id);
    }

    public function messages()
    {
        return [
            'name.unique' => 'The name is already exist!',
            'required' => 'The field :attribute is required'
        ];
    }
}
