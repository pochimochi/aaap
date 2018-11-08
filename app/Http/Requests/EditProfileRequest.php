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


class EditProfileRequest extends FormRequest
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
            'pwaOccupation' => 'nullable|string',
            'landline_number' => 'nullable|numeric|digits_between:7',
            'mobile_number' => 'required|numeric|digits:13',
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

            //address
            'unitno.required' => 'The house/apartment/unit number is required.',
            'unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'bldg.regex' => 'The building format is invalid.',
            'street.regex' => 'The street format is invalid.',
            'city.regex' => 'The city format is invalid.',
            'country_id.required' => 'The country field is required.',

            'tunitno.regex' => 'The house/apartment/unit number format is invalid.',
            'tbldg.regex' => 'The building format is invalid.',
            'tstreet.regex' => 'The street format is invalid.',
            'tcity.regex' => 'The city format is invalid.',
//            'tcountry.required'=> 'The country field is required.',

            'eunitno.regex' => 'The house/apartment/unit number format is invalid.',
            'ebldg.regex' => 'The building format is invalid.',
            'estreet.regex' => 'The street format is invalid.',
            'ecity.regex' => 'The city format is invalid.',
//            'ecountry.required'=> 'The country field is required.',

            'email.required' => 'The email address field is required.',
            'email.unique' => 'The email address is already taken.',
            'email.email' => 'The email address format is invalid.',

            'profile_id' => 'The profile picture must be an image.',
        ];
    }

}