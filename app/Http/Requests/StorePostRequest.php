<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest {
    public function authorize(): bool { return true; } // التفويض يتم في الـ Controller عبر الـ Policies
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug'], // منع slug المكرر
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'], // التحقق من الصورة
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id']
        ];
    }
}