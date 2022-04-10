<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StokRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        'id' => 'required',
                        'tgl_beli' => 'required',
                        'tgl_kadaluarsa' => 'required',
                        'jumlah_beli' => 'required',
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'bahan_baku_id' => 'required',
                        'tgl_beli' => 'required',
                        'tgl_kadaluarsa' => 'required',
                        'jumlah_beli' => 'required',
                        'sisa' => 'required',
                    ];
                }
            default:break;
        }

    }
}
