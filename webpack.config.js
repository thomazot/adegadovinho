module.exports = (env, argv) => {
    "use strict";
    const path                    = require("path");
    const MiniCssExtractPlugin    = require("mini-css-extract-plugin");
    const UglifyJsPlugin          = require("uglifyjs-webpack-plugin");
    const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
    const development             = argv.mode;

    // IN and OUT
    const config = {
        entry: {
            app: './src/app.js'
        },
        output: {
            path: path.resolve(__dirname, './www/themes/wordpress/assets/'),
            filename: '[name].js'
        }
    };

    // Resolve
    config.resolve = {
        extensions: ['.js', '.jsx', '.json'],
        alias: {
            Configs: path.resolve(__dirname, './src/configs'),
            Assets: path.resolve(__dirname, './src/assets')
        }
    };

    //  Plugins
    config.plugins = [
        new MiniCssExtractPlugin({
            filename: "[name].css"
        })
        // new webpack.ProvidePlugin({})
    ];

    // Modules
    config.module = {
        rules: [
            {
                test: /\.(js|jsx)?$/,
                loader: "babel-loader",
                exclude: /node_modules/,
                query: {
                    plugins: [
                        ["@babel/plugin-transform-modules-commonjs", {
                            'allowTopLevelThis': true
                        }],
                        "@babel/plugin-transform-runtime", 
                        "@babel/plugin-syntax-dynamic-import"
                    ],
                    presets: ["@babel/preset-env"]
                }
            },
            {
                test: /\.(eot|woff|woff2|ttf|png|jpg|gif)$/,
                loader: 'url-loader?limit=30000&name=[name]-[hash].[ext]'
            },
            {
                test: /\.svg$/,
                use: [
                    { loader: 'svg-sprite-loader', options: {} },
                    'svg-transform-loader',
                    'svgo-loader'
                ]
            },
            {
                test: /\.(styl|css)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {  
                            plugins: (loader) => [
                                require('autoprefixer')({
                                    grid: true
                                }),
                                require('postcss-pxtorem')({
                                    unitPrecision: 5,
                                    propList: ['font', 'font-size', 'line-height', 'letter-spacing', 'width', 'height', 'max-width', 'min-width', 'padding', 'margin'],
                                    selectorBlackList: [],
                                    replace: true,
                                    mediaQuery: false,
                                    minPixelValue: 0
                                }),
                                require('postcss-object-fit-images')
                            ]
                        }
                    },
                    {
                        loader: 'stylus-loader',
                        options: {
                            import: [
                                path.resolve(__dirname, './src/configs/assets/variables.styl')
                            ]
                        }
                    },
                ]
            }
        ]
    };

    if(development == 'development' && argv.host) {
        const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

        config.plugins = config.plugins.concat([
            new BrowserSyncPlugin({
                port: 3000,
                proxy: "http://adegadovinho.localhost",
                browser: "google chrome",
                open: true
            })
        ]);
        console.log('BrowserSync: true', argv.host);
    }

    // Production 
    if(development == 'production') {
        config.optimization = {
            splitChunks: false,
            minimizer: [
                new UglifyJsPlugin({
                    cache: true,
                    parallel: true,
                    sourceMap: false,
                    uglifyOptions: {
                        compress: {
                            drop_console: true,
                        }
                    }
                }),
                new OptimizeCSSAssetsPlugin({})
            ]
        }
    } else {
        config.optimization = {
            splitChunks: false
        }
    }
    
    return config;
}
