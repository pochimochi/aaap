<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 24/10/2018
 * Time: 6:04 PM
 */

namespace App\Http\Requests;

use JsValidator;
use Illuminate\Foundation\Http\FormRequest;


class RegisterFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'middlename' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'lastname' => 'required|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'gender' => 'required',
            'profile_id' => 'nullable|image|mimes:jpeg,jpg,png|max:8000',
            'password' => 'required|max:64|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'idverification_id' => 'required|mimes:jpg,jpeg,png,docx,doc,pdf|max:8000',
            'email' => 'required|unique:users,email|email',
            'unitno' => 'required|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'bldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'street' => 'required|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'city' => 'required|string|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'country_id' => 'required|integer|exists:countries,id',
            'tunitno' => 'nullable|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tbldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tstreet' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcity' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'tcountry' => 'nullable|integer|exists:countries,id',
            'eunitno' => 'nullable|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ebldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'estreet' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecity' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'ecountry' => 'nullable|integer|exists:countries,id',
            'employerName' => 'nullable|string|max:50|regex:/^[a-z ,.\'-]+$/i',
            'employerAddress' => 'nullable|string|regex:/^[a-z ,.\'-]+$/i',
            'employerContactNumber' => 'nullable|numeric|digits_between:7,13',
            'description' => 'nullable|string',
            'pwaLastName' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaFirstName' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaMiddleName' => 'nullable|max:30|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaGender' => 'nullable|integer',
            'pwaRelationship' => 'nullable|max:50|string|regex:/^[a-z ,.\'-]+$/i',
            'pwaOccupation' => 'nullable|max:50|string|regex:/^[a-z ,.\'-]+$/i',
            'landline_number' => 'nullable|numeric|digits:7',
            'mobile_number' => 'required|numeric|digits_between:11,13',
            'terms' => 'required'
        ];
    }

    public function messages()
    {
        return [
            //names
            'firstname.required' => 'The first name field is required.',
            'firstname.max' => 'The first name may not be greater than 30 characters.',
            'firstname.regex' => 'The first name format is invalid.',
            'middlename.regex' => 'The middle name format is invalid',
            'middlename.max' => 'The middle name may not be greater than 30 characters.',
            'lastname.required' => 'The last name field is required',
            'lastname.max' => 'The last name may not be greater than 30 characters.',
            'lastname.regex' => 'The last name format is invalid.',
            'pwaFirstName.max' => 'The first name may not be greater than 30 characters.',
            'pwaFirstName.regex' => 'The first name format is invalid.',
            'pwaMiddleName.max' => 'The middle name may not be greater than 30 characters.',
            'pwaMiddleName.regex' => 'The middle name format is invalid.',
            'pwaLastName.regex' => 'The last name format is invalid',
            'pwaLastName.max' => 'The last name may not be greater than 30 characters.',
            'pwaRelationship.max' => 'The relationship may not be greater than 50 characters.',
            'pwaOccupation.max' => 'The occupation may not be greater than 50 characters.',
            'pwaRelationship.regex' => 'The relationship format is invalid.',
            'pwaOccupation.regex' => 'The occupation format is invalid.',

            //address
            'unitno.required' => 'The house/apartment/unit number is required.',
            'unitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'bldg.regex' => 'The building format is invalid.',
            'bldg.max' => 'The building may not be greater than 50 characters.',
            'street.regex' => 'The street format is invalid.',
            'street.max' => 'The street may not be greater than 50 characters.',
            'city.regex' => 'The city format is invalid.',
            'city.max' => 'The city may not be greater than 50 characters.',
            'country_id.required' => 'The country field is required.',

            'tunitno.regex' => 'The house/apartment/unit number format is invalid.',
            'tunitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'tbldg.regex' => 'The building format is invalid.',
            'tbldg.max' => 'The building may not be greater than 50 characters.',
            'tstreet.regex' => 'The street format is invalid.',
            'tstreet.max' => 'The street may not be greater than 50 characters.',
            'tcity.regex' => 'The city format is invalid.',
            'tcity.max' => 'The city may not be greater than 50 characters.',
//            'tcountry.required'=> 'The country field is required.',

            'eunitno.regex' => 'The house/apartment/unit number format is invalid.',
            'eunitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'ebldg.regex' => 'The building format is invalid.',
            'ebldg.max' => 'The building may not be greater than 50 characters.',
            'estreet.regex' => 'The street format is invalid.',
            'estreet.max' => 'The street may not be greater than 50 characters.',
            'ecity.regex' => 'The city format is invalid.',
            'ecity.max' => 'The city may not be greater than 50 characters.',
//            'ecountry.required'=> 'The country field is required.',

            'email.required' => 'The email address field is required.',
            'email.unique' => 'The email address is already taken.',
            'email.email' => 'The email address format is invalid.',

            'profile_id' => 'The profile picture must be an image.',
            'idverification_id.required' => 'The ID Verification field is required. Please upload a photo or file of your ID.',
            'password.regex' => 'The password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 Special Character.',
            'terms.required' => 'You must agree to the terms and conditions before creating an account.'
        ];
    }

}
