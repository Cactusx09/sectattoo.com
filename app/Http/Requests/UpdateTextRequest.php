<?php

namespace App\Http\Requests;

use App\Text;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTextRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'bio' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'mail' => [
                'required',
            ],
            'instagram' => [
                'required',
            ],
            'facebook' => [
                'required',
            ],
        ];
    }
}
