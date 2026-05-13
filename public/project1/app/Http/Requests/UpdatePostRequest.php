<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // التحقق يتم عبر Policy
    }

    public function rules(): array
    {
        $postId = $this->route('post')->id ?? $this->route('post');

        return [
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($postId),
            ],
            'body'           => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif', 'max:2048'],
            'status'         => ['required', 'in:draft,published'],
            'published_at'   => ['nullable', 'date'],
            'tags'           => ['nullable', 'array'],
            'tags.*'         => ['exists:tags,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'عنوان المقال مطلوب',
            'body.required'           => 'محتوى المقال مطلوب',
            'slug.unique'             => 'هذا الرابط مستخدم مسبقاً، اختر رابطاً آخر',
            'featured_image.image'    => 'الملف المرفوع يجب أن يكون صورة',
            'featured_image.max'      => 'حجم الصورة لا يجب أن يتجاوز 2MB',
            'status.in'               => 'حالة المقال غير صحيحة',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('title') && !$this->filled('slug')) {
            $this->merge([
                'slug' => \Illuminate\Support\Str::slug($this->title),
            ]);
        }
    }
}
