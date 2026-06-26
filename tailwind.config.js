import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
<<<<<<< HEAD
=======


>>>>>>> 802ca6c7c538885cf52bd2da882caf0c2e0fea4a
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
<<<<<<< HEAD
};
=======
};
>>>>>>> 802ca6c7c538885cf52bd2da882caf0c2e0fea4a
