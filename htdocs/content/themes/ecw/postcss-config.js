var postcssFocusWithin = require('postcss-focus-within');

module.exports = {
  plugins: {
    tailwindcss: {},
    autoprefixer: {}
  }
};

module.exports = {
  plugins: [
    postcssFocusWithin(/* pluginOptions */)
  ]
};
