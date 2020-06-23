<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class AddressBook extends Model
{
    protected $fillable = ["first_name", "last_name", "email", "phone", "street", "zip_code", "city", "profile_pic"];

    public static function rules($id = null) {
        $rules = [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "phone" => "required|numeric|digits:10",
            "street" => "required",
            "zip_code" => "required",
            "city" => "required",
            "profile_pic" => "file|mimes:jpeg,gif,png,webp,svg|max:300|dimensions:max_width=150,max_height=150"
        ];

        if($id !== null){
            $rules["email"] = ["required", "email", Rule::unique('address_books')->ignore($id)];
        } else{
            $rules["email"] = "required|email|unique:address_books,email";
        }
        return $rules;

    }


    public function cityData() {
        return $this->belongsTo(City::class, "city", "id");
    }
}
