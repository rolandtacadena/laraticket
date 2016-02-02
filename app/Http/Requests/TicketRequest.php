<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TicketRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user()->is_admin()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:5|max:255',
            'description'   =>  'required|min:5|max:3000',
            'dev_loe'       => 'required|integer|min:0|max:100'
        ];
    }
}
