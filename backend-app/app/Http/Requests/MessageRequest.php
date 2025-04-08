<?php

namespace App\Http\Requests;

use App\Enums\MessageType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class MessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receive' => ['nullable', 'required_if:group_id,null', 'exists:users,id'],
            'message' => ['required'],
            'type' => ['required', new Enum(MessageType::class)],
            'group_id' => ['nullable', 'required_if:receive,null', 'exists:groups'],
        ];
    }
}
