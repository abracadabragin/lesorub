<?php

namespace Lesorub\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
        $rules = [
            "author_name" => "required|max:255",
            "text" => "required"
        ];

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
            'author_name.required' => 'Имя обязательно для заполнения',
            'text.required' => 'Текст отзыва обязателен для заполнения',
            'author_name.max' => 'Слишком длинное имя',
            'photos.*.image' => 'Можно загружать только изображения в формате JPG, PNG, BMP',
            'photos.*.max' => 'Максимальный размер изображения 2 МБ'
        ];
    }
}
