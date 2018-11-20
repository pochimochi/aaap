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
            'profile.location' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
            'idverification_id.location' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
            'email' => 'required|email',
            'paddress.unitno' => 'required|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'paddress.bldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'paddress.street' => 'required|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'paddress.name' => 'required|string|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'paddress.province' => 'required|string|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'paddress.country_id' => 'required|integer|exists:countries,id',
            'taddress.unitno' => 'nullable|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'taddress.bldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'taddress.street' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'taddress.city' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'taddress.province' => 'nullable|string|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'taddress.country' => 'nullable|integer|exists:countries,id',
            'eaddress.unitno' => 'nullable|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'eaddress.bldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'eaddress.street' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'eaddress.city' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'eaddress.province' => 'nullable|string|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'eaddress.country' => 'nullable|integer|exists:countries,id',
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
            'paddress.unitno.required' => 'The house/apartment/unit number is required.',
            'paddress.unitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'paddress.unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'paddress.bldg.regex' => 'The building format is invalid.',
            'paddress.bldg.max' => 'The building may not be greater than 50 characters.',
            'paddress.street.regex' => 'The street format is invalid.',
            'paddress.name.required' => 'The city is required.',
            'paddress.street.max' => 'The street may not be greater than 50 characters.',
            'paddress.name.regex' => 'The city format is invalid.',
            'paddress.name.max' => 'The city may not be greater than 50 characters.',
            'paddress.province.required' => 'The state/province is required.',
            'paddress.province.regex' => 'The state/province format is invalid.',
            'paddress.province.max' => 'The state/province may not be greater than 50 characters.',
            'paddress.country_id.required' => 'The country field is required.',

            'taddress.unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'taddress.unitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'taddress.bldg.regex' => 'The building format is invalid.',
            'taddress.bldg.max' => 'The building may not be greater than 50 characters.',
            'taddress.street.regex' => 'The street format is invalid.',
            'taddress.street.max' => 'The street may not be greater than 50 characters.',
            'taddress.name.regex' => 'The city format is invalid.',
            'taddress.name.max' => 'The city may not be greater than 50 characters.',
            'taddress.province.regex' => 'The state/province format is invalid.',
            'taddress.province.max' => 'The state/province may not be greater than 50 characters.',
//            'tcountry.required'=> 'The country field is required.',

            'eaddress.unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'eaddress.unitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'eaddress.bldg.regex' => 'The building format is invalid.',
            'eaddress.bldg.max' => 'The building may not be greater than 50 characters.',
            'eaddress.street.regex' => 'The street format is invalid.',
            'eaddress.street.max' => 'The street may not be greater than 50 characters.',
            'eaddress.name.regex' => 'The city format is invalid.',
            'eaddress.name.max' => 'The city may not be greater than 50 characters.',
            'eaddress.province.regex' => 'The state/province format is invalid.',
            'eaddress.province.max' => 'The state/province may not be greater than 50 characters.',
//            'ecountry.required'=> 'The country field is required.',

            'email.required' => 'The email address field is required.',
            'email.unique' => 'The email address is already taken.',
            'email.email' => 'The email address format is invalid.',

            'profile_id' => 'The profile picture must be an image.',

        ];
    }

}
