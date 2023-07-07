<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'Nim' => 'required',
            'Nama' => 'required',
            'kelas_id' => 'required',
            'Email'=>'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Tanggal_lahir' => 'required',
        ];
    }
}
