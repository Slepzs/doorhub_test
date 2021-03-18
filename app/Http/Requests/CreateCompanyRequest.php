<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'companyName' => 'required',
            'companyAddress' => 'required',
            'country' => 'required',
            'town' => 'required',
            'houseNo' => 'required',
            'phoneNumber' => 'required',
            'vatNumber' => 'required',
        ];
    }
}
