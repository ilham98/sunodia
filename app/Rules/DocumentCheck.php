<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DocumentCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($length)
    {
        $this->defaultLength = $length;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pass = true;
        $allowedExtension = ['jpg', 'pdf', 'png'];

        if(count($value) != $this->defaultLength)
            return false;

        foreach($value as $d) {
            if(!in_array($d->getClientOriginalExtension(), $allowedExtension))
                $pass = false;
        }

        return $pass;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Isi semua form dan pastikan ekstensi file adalah jpg, png, atau pdf';
    }
}
