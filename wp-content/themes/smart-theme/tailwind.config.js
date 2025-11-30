/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './inc/**/*.php',
        './template-parts/**/*.php',
        './woocommerce/**/*.php',
        './assets/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                // Smart Electronics Brand Colors
                'smart-primary': '#0066CC',    // Primary Blue
                'smart-secondary': '#FF6600',  // Accent Orange
                'smart-dark': '#1A1A1A',       // Dark Gray
                'smart-light': '#F5F5F5',      // Light Gray
                'sony-red': '#E30000',         // Sony Brand Red
                'smart-green': '#00A651',      // Success Green
                'smart-yellow': '#FFB81C',     // Warning Yellow
            },
            fontFamily: {
                'sans': ['Inter', 'system-ui', 'sans-serif'],
                'bangla': ['Noto Sans Bengali', 'system-ui', 'sans-serif'],
                'display': ['Poppins', 'system-ui', 'sans-serif'],
            },
            fontSize: {
                'xxs': '0.625rem',   // 10px
                'xs': '0.75rem',      // 12px
                'sm': '0.875rem',     // 14px
                'base': '1rem',       // 16px
                'lg': '1.125rem',     // 18px
                'xl': '1.25rem',      // 20px
                '2xl': '1.5rem',      // 24px
                '3xl': '1.875rem',    // 30px
                '4xl': '2.25rem',     // 36px
                '5xl': '3rem',        // 48px
            },
            spacing: {
                '18': '4.5rem',
                '22': '5.5rem',
                '26': '6.5rem',
            },
            maxWidth: {
                '8xl': '88rem',
                '9xl': '96rem',
            },
            screens: {
                'xs': '475px',
                '3xl': '1920px',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
