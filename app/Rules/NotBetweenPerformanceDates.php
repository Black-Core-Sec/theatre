<?php

namespace App\Rules;

use App\Models\Performance;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class NotBetweenPerformanceDates implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $value = Carbon::parse($value)->format('Y-m-d');
        return Performance::
            where('start_date', '<=', $value)
            ->where('end_date', '>=', $value)
            ->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute ust not crossing with dates of other performances.';
    }
}
