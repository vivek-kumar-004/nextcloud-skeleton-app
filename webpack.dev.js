const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
<<<<<<< HEAD
	mode: 'development',
	devtool: '#inline-source-map',
});
=======
  mode: 'development',
  devtool: '#inline-source-map'
})
>>>>>>> 24eaa13bde9dc2b7c14c65f0beaa9508cb454aba
