const path                  =   require( 'path' );
const webpack               =   require( 'webpack' );
const MiniCssExtractPlugin  =   require( 'mini-css-extract-plugin' );

// Extract CSS for Gutenberg Editor
const editor_css_plugin       =   new MiniCssExtractPlugin({
    filename:               'blocks-[name].css'
});

module.exports          =   {
    entry:                  './app/index.js',
    output: {
        path:               path.resolve( __dirname, 'dist' ),
        filename:           'bundle.js',
    },
    mode:                   'development',
    watch:                  true,
    devtool:                'cheap-eval-source-map',
    module: {
        rules: [
            {
                test:       /\.js$/,
                exclude:    /(node_modules)/,
                use:        'babel-loader',
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                  // Creates `style` nodes from JS strings
                  "style-loader",
                  // Translates CSS into CommonJS
                  "css-loader",
                  // Compiles Sass to CSS
                  "sass-loader",
                ],
            }
        ]
    },
    plugins:    [
        editor_css_plugin
    ]
};
