<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * HomeController
 * 
 * يدير الصفحة الرئيسية (Welcome Page) ويقوم بجلب البيانات اللازمة لكل الأقسام
 */
class HomeController extends Controller
{
    /**
     * عرض الصفحة الرئيسية مع جميع الأقسام
     * 
     * @return View
     */
    public function index(): View
    {
        // 1. جلب الجامعات المميزة (مثلاً آخر 6 جامعات مضافة أو مرتبة حسب الترتيب المحلي)
        $universities = University::orderBy('rank_local', 'asc')
                                  ->take(6)
                                  ->get();

        // 2. بيانات قسم البطل (Hero Section)
        $heroData = [
            'title' => 'مستقبلك الأكاديمي يبدأ هنا: دليلك الشامل للجامعات التركية',
            'subtitle' => 'نقدم لك استشارات متكاملة وشاملة، نرافقك خطوة بخطوة من اختيار التخصص والجامعة حتى إتمام التسجيل وبدء رحلتك التعليمية في تركيا.',
            'buttonText' => 'ابدأ استشارتك المجانية الآن',
            'backgroundImage' => asset('images/hero-bg.jpg'),
        ];

        // 3. تمرير جميع البيانات إلى صفحة welcome
        return view('home', compact('universities', 'heroData'));
    }
}