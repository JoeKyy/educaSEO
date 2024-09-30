// tailwind.config.js
module.exports = {
  content: ["./*.{html,js}"],
  theme: {
    extend: {
      backgroundImage: {
          'gradient-to-r': 'linear-gradient(to right, #693D90, #E71883)'
      },
      colors: {
        purple: {
          100: '#E6D8F1',
          500: '#820AD1',
          700: '#613C90',
          800: '#693D90',
          900: '#693D8F'
        },
        pink: {
          100: '#F8DDEA',
          300: '#E71883',
          500: '#BF2387',
          700: '#E61882'
        },
        red: {
          500: '#d81b60'
        },
        black: {
          900: '#000000'
        },
        darkGray: {
          800: '#1E1E1E',
          700: '#454040',
          600: '#3C3C3B'
        },
        gray: {
          300: '#D9D9D9',
          200: '#BEBEBE',
          100: '#EFEFEF'
        },
        white: {
          100: '#ffffff'
        }
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      },
      fontSize: {
        xs: '0.75rem',
        sm: '0.875rem',
        base: '1rem',
        lg: '1.25rem',
        xl: '1.5rem',
        '2xl': '2rem',
        '3xl': '3rem',
        '4xl': '3.75rem'
      },
      fontWeight: {
        regular: 400,
        medium: 500,
        semibold: 600,
        bold: 700
      }
    }
  },
  variants: {},
  plugins: [],
};
