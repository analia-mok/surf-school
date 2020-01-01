module.exports = {
  theme: {
    extend: {
      colors: {
        teal: {
          100: '#F4FCFC',
          200: '#D3F6F8',
          300: '#A9EBF0',
          400: '#81DFE6',
          500: '#34C3CD',
          600: '#27ABB4',
          700: '#1B9199',
          800: '#12757C',
          900: '#052D30',
          '-500': 'rgba(52, 195, 205, 0.4)',
        },
        purple: {
          500: '#8987A1',
        },
      },
      flex: {
        half: '1 1 50%',
        full: '1 1 100%',
      },
      fontFamily: {
        sans: [
          'Inter',
          '-apple-system',
          'BlinkMacSystemFont',
          '"Segoe UI"',
          'Roboto',
          '"Helvetica Neue"',
          'Arial',
          '"Noto Sans"',
          'sans-serif',
          '"Apple Color Emoji"',
          '"Segoe UI Emoji"',
          '"Segoe UI Symbol"',
          '"Noto Color Emoji"',
        ],
      },
      height: {
        'screen-90': '90vh',
      },
    },
  },
  variants: {},
  plugins: [],
};
