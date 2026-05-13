<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // التحقق يتم عبر Policy
    }

    public function rules(): array
    {
        return [
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
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

    /**
     * تحضير البيانات قبل التحقق
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('title') && !$this->filled('slug')) {
            $this->merge([
                'slug' => \Illuminate\Support\Str::slug($this->title),
            ]);
        }

        // إذا المنشور ينشر الآن ولم يحدد وقت النشر
        if ($this->input('status') === 'published' && !$this->filled('published_at')) {
            $this->merge([
                'published_at' => now(),
            ]);
        }
    }
}
