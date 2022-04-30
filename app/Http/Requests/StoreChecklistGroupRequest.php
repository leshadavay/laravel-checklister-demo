<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChecklistGroupRequest extends FormRequest
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

        //default rules
        $rules =  [
            'name'  =>  ['required'],
            'description'   =>  ['required']
        ];

        switch ($this->route()->getName()){

            case 'admin.checklist_groups.store':

                //alternative => unique:checklist_groups
                array_push($rules['name'],Rule::unique('checklist_groups'));
                break;

            //accept previous (same) name if update mode
            case 'admin.checklist_groups.update':

                array_push($rules['name'],Rule::unique('checklist_groups')->ignore($this->checklist_group));
                break;
        }

        return $rules;
    }
}
