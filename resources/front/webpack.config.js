const path = require('path');
const MinifyPlugin = require("babel-minify-webpack-plugin");
const webpack = require('webpack')
const VueLoaderPlugin = require('vue-loader/lib/plugin')

module.exports = {
    mode: "development",
    entry: path.resolve(__dirname, "entry.js"),
    output: {
        path: path.resolve("public"),
        filename: "bundle-front.js",
    },
    resolve: {
        modules: [ path.resolve('node_modules')],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            Base: path.resolve('public/base'),
            // Base: path.resolve(__dirname, 'public/base'),
        },
        extensions: [".js", ".json", ".jsx", ".css"],
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.(css|sass|scss)$/,
                use: [
                    {
                        loader: 'style-loader', // inject CSS to page
                    },
                    {
                        loader: 'css-loader', // translates CSS into CommonJS modules
                        options: {
                            url: false,
                        },
                    },
                    {
                        loader: 'postcss-loader', // Run post css actions
                        options: {
                            plugins: function () { // post css plugins, can be exported to postcss.config.js
                                return [
                                    // require('precss'),
                                    require('autoprefixer')
                                ];
                            }
                        }
                    },
                    {
                        loader: 'sass-loader' // compiles Sass to CSS
                    }
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'fonts/'
                    }
                }]
            }
        ]
    },
    plugins: [
        // new MinifyPlugin({}, {}),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),
        new VueLoaderPlugin()
    ],
}
