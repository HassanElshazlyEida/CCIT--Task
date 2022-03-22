<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct()
    {
        $this->user_plans = User::$payment_plan;
    }
    public function authorize()
    {
        return true;
    }
    protected function prepareForValidation(): void
    {
        $this->merge(session()->get('process_1') ?? []);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules= [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if($this->request->get('payment_plan')){
            $rules['payment_plan']= ['required', 'in:'.implode (",", $this->user_plans)];
        }
        return $rules;

    }
}
