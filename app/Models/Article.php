<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'image', 'category',
        'difficulty', 'read_time', 'author_id', 'is_published', 'views'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'views' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getCategoryNameAttribute()
    {
        $categories = [
            'turkey-studies' => '🎓 الدراسة في تركيا',
            'exams' => '📝 اختبارات القبول',
            'scholarships' => '🏆 المنح الدراسية',
            'certificates' => '📜 الشهادات',
            'testimonials' => '💬 قصص النجاح',
            'all' => '📚 جميع المقالات',
        ];
        return $categories[$this->category] ?? '📄 مقال';
    }

    public function getDifficultyNameAttribute()
    {
        $difficulties = [
            'beginner' => '🟢 مبتدئ',
            'intermediate' => '🟡 متوسط',
            'advanced' => '🔴 متقدم',
        ];
        return $difficulties[$this->difficulty] ?? '🟢 مبتدئ';
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
}