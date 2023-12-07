# How to use

Paste `BCD/` folder and `bcd-loader.php` file inside `your_website/wp-content/mu-plugins/`.

If `mu-plugins` folder don't exist, you must create it (do not paste it on `plugins` folder).

# For developers

## JS and SCSS customizations

On production level, the system runs minified versions of the JS and CSS files for better performance. So we must compile and minify them with Node.JS during the development process.

The manipulatable content is located on `BCD/src/`.

### NPM

On your terminal, navigate to `your_website/wp-content/mu-plugins/BCD/`, then run the following commands:

```bash
## Install dependencies
npm install

## Start the compiler
npm run start
```

### Config

On `bcd-loader.php`, find this block and change the constant value to false:

```php
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Controls whether to enqueue minified or normal CSS and JS files.
 *
 *   ----------------------------------------------------------------------------------------
 */
define( 'BCD__MINIFIED', true );
```

### After customization

On your dev environment you can use the normal JS/CSS files, but on production I strongly recommend you to minify again.

On your terminal, press `Ctrl + C` to kill the compiler if it's still running; run `npm run build`; and change the PHP constant value to true again.

This will generate the minified files of your brand new code. 