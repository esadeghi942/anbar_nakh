<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CustomerRequest extends FormRequest
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
        if ($this->customer)
            return [
                'code' => 'unique:customers,id,'.$this->customer->id,
            ];
        else
            return [
                'code' => 'unique:customers'
            ];
    }

    public function attributes()
    {
        return [
            'code'=>trans('code')
        ];
    }
}
