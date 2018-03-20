<?php

namespace Lesorub\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        switch($this->method()) {
            case 'POST':
                $rules = [
                    "title" => "required|max:255|unique:products,title",
                    "description" => "required",
                    "price" => "required|numeric|min:0",
                    "old-price" => "required_if:discount,on|nullable|numeric|min:0"
                ];
                break;
            case 'PATCH':
                $rules = [
                    "title" => "required|max:255|unique:products,title," . $this->product->id,
                    "description" => "required",
                    "price" => "required|numeric|min:0",
                    "old-price" => "required_if:discount,on|nullable|numeric|min:0"
                ];
                break;
            default:
                $rules = [];
                break;
        }

        $photos = count($this->allFiles());

        foreach(range(0, $photos) as $index) {

            $rules['photos.' . $index] = 'image|max:2000';

        }

        return $rules;

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'title.required' => 'Название обязательно для заполнения',
          'description.required' => 'Описание обязательно для заполнения',
          'price.required' => 'Цена обязательна для заполнения',
          'old-price.required_if' => 'Старая цена обязательна для заполнения, если установлена галочка \'акция\'',
          'title.unique' => 'Название должно быть уникальным',
          'title.max' => 'Слишком длинное название',
          'price.numeric' => 'Цена должна быть числом',
          'price.min' => 'Цена должна быть неотрицательна',
          'old-price.numeric' => 'Старая цена должна быть числом',
          'old-price.min' => 'Старая цена должна быть неотрицательна',
          'photos.*.image' => 'Можно загружать только изображения в формате JPG, PNG, BMP',
          'photos.*.max' => 'Максимальный размер изображения 2 МБ'
        ];
    }
}
