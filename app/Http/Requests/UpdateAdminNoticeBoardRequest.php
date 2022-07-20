<?php

namespace App\Http\Requests;

use App\Models\AdminNoticeBoard;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminNoticeBoardRequest extends FormRequest
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
        $rules = AdminNoticeBoard::$rules;
        $rules['name'] = 'required|max:180|unique:post_categories,name,'.$this->route('AdminNoticeBoard')->id;

        return $rules;
    }
}
