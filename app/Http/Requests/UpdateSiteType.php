<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteType extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'main_word_ar' => 'required',
            'main_word_en' => 'required',
            'submain_word_ar' => 'required',
            'submain_word_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'button_word_ar' => 'required',
            'button_word_en' => 'required',
            'time_out_seconds' => 'required',
            'type' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title_ar.required' => 'العنوان (AR) مطلوب',
            'title_en.required' => 'العنوان (EN) مطلوب',
            'main_word_ar.required' => 'الكلمة الرئيسية (AR) مطلوب',
            'main_word_en.required' => 'الكلمة الرئيسية (EN) مطلوب',
            'submain_word_ar.required' => 'الكلمة الرئيسية الفرعية (AR) مطلوب',
            'submain_word_en.required' => 'الكلمة الرئيسية الفرعية (EN) مطلوب',
            'description_ar.required' => 'الوصف (AR) مطلوب',
            'description_en.required' => 'الوصف (EN) مطلوب',
            'button_word_ar.required' => 'عنوان الزر (AR) مطلوب',
            'button_word_en.required' => "عنوان الزر (EN) مطلوب",
            'time_out_seconds.required' => 'المهلة بالثانية مطلوب',
        ];
    }
}
