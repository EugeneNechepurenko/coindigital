<?php

namespace App\Http\Requests;

use App\Http\Requests\APIRequest;
use Illuminate\Validation\Rule;

/**
 * Class DefaultListRequest
 *
 * @package App\Http\Requests
 */
class DefaultListRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status_id'     => 'string|nullable',
            'order_by'      => 'string|nullable',
            'order'         => ['string', Rule::in(['asc', 'desc'])],
            'per_page'      => 'integer|nullable',
            'page'          => 'integer|nullable',
            'filter.column' => 'string|nullable',
            'filter.value'  => 'string|nullable',
        ];
    }
}
