<?php

namespace App\Http\Requests\String;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cell1'=>'required',
            'cell2'=>'required',
            'anbar1'=>'required',
            'anbar2'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'cell1'=>'سلول مبدا',
            'cell2'=>'سلول مقصد',
            'anbar1'=>'انبار مبدا',
            'anbar2'=>'انبار مقصد',
        ];
    }
}
