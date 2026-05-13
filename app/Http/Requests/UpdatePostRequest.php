<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest {
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($this->post)], // استثناء البوست الحالي
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id']
        ];
    }
}