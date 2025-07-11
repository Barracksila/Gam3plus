/* eslint-disable no-undef */
module.exports = {
  root: true,
  env: {
    browser: true,
    node: true,
    es2021: true,
  },
  extends: [
    'airbnb-base',
    'plugin:vue/vue3-recommended',
  ],
  parserOptions: {
    ecmaVersion: 2021,
    sourceType: 'module',
  },
  plugins: [
    'vue',
  ],
  rules: {
    // Allow .vue and .js imports without extensions
    'import/extensions': ['error', 'always', {
      js: 'never',
      vue: 'never',

    }],

    // Allow console logs and debuggers in dev mode
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',

    // Optional: You can tweak or disable Airbnb rules you find too strict
    // 'no-param-reassign': 'off',
    // 'no-plusplus': 'off',
  },
  settings: {
    'import/resolver': {
      node: {
        extensions: ['.js', '.vue'],
      },
    },
  },
};
