<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
          'name' => 'required',
          'email' => 'required|email|unique:users,email',
          'username' => 'required|unique:users,username',
          'password' => 'required|min:6',
          'phone' => 'required|digits:10',
          'avtars' => 'required'
        ];
    }
    public function messages(){
        return [
          'name.required' => 'Full name field required',
          'email.required' => 'Please Enter the value on Email field',
          'email.email' => 'Enter Correct Email',
          'email.unique' => 'Email Already Exist.',
          'username.required' => 'Please Enter the value on Userename field',
          'username.email' => 'Enter Correct Userename',
          'username.unique' => 'Userename Already Exist.',
          'password.required' => 'Please Enter the value on Password field',
          'password.min' => 'Please Enter minimum 6 charcters in password field.',
          'phone.required' => 'Please Enter the value on Phone field',
          'phone.digits' => 'Please Enter only 10 Numeric digits.',
          'avtars.required' => 'Please attach user profile pic.'
        ];
      }
}
