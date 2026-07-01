// resources/js/translate.js

// ترجمة Google
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'ar',
        includedLanguages: 'en,tr',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false,
        multilanguagePage: true
    }, 'google_translate_element');
}

// دالة تغيير اللغة يدوياً
function changeLanguage(lang) {
    // تحديث localStorage
    localStorage.setItem('selectedLanguage', lang);

    // تغيير اتجاه الصفحة
    if (lang === 'ar') {
        document.documentElement.dir = 'rtl';
        document.documentElement.lang = 'ar';
    } else {
        document.documentElement.dir = 'ltr';
        document.documentElement.lang = lang;
    }

    // تفعيل ترجمة Google للغة المختارة
    const selectField = document.querySelector('.goog-te-combo');
    if (selectField) {
        selectField.value = lang;
        selectField.dispatchEvent(new Event('change'));
    }

    // تحديث مظهر الأزرار
    updateActiveButton(lang);
}

// تحديث الزر النشط
function updateActiveButton(lang) {
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.remove('active-lang');
        if (btn.getAttribute('data-lang') === lang) {
            btn.classList.add('active-lang');
        }
    });
}

// استعادة اللغة المحفوظة عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    const savedLang = localStorage.getItem('selectedLanguage') || 'ar';

    // انتظر حتى يتم تحميل أداة الترجمة
    setTimeout(() => {
        changeLanguage(savedLang);
    }, 1000);

    // إخفاء شريط Google العلوي
    const style = document.createElement('style');
    style.textContent = `
        body { top: 0 !important; }
        .goog-te-banner-frame { display: none !important; }
        .goog-te-gadget-simple {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
        }
        .goog-te-gadget-icon { display: none !important; }
        .goog-te-menu-value { display: none !important; }
    `;
    document.head.appendChild(style);
});
