<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MembershipNo;

class MemberUpdateFormRequest extends FormRequest
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
          'membership_no' => [
            'required',
            'unique:members',
            new MembershipNo,
          ],
          'nric' => [
            'required',
            'regex:/^([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9]{6})$/',
          ],
          'name' => 'required|max:100',
          'address' => 'required|max:500',
          'postcode' => [
            'required',
            'regex:/^([0-9]{5})$/'
          ],
          'city' => 'required|max:50',
          'state' => 'required',
          'phone' => [
            'required',
            'regex:/^([0-9]{2,3})\-([0-9]{6,8})$/',
          ],
          'division_id' => 'required',
        ];
    }
}
