RrcomLessModule
===============

Zend frameword 2 module that automatically compile LESS file to CSS

How to use
===============

1. Save this module to your module directory
2. add "RrcomLessModule" in your zf2 config inside the modules array (config/application.config.php)
3. create "rrcomlessmodule.local.php" in config/autoload directory
4. populate "rrcomlessmodule.local.php" with this example value

```php
<?php
return array(
    'rrcomlessmodule' => array(
        // enable or disable auto compiling (must be disable in production environment to reduce processing time)
        'enable' => true,
        
        // The files to compile and theirs output directory
        'files' => array(
            array(
                // .less source directory 1
                'less-file' => './public/less/sample1.less',
                
                // .css output directory 1
                'css-file' => './public/css/sample1.css',
                
                /*
                * Set formatter
                * lessjs (default) — Same style used in LESS for JavaScript
                * compressed — Compresses all the unrequired whitespace
                * classic — lessphp’s original formatter
                */
                'formatter' => 'compressed',
            ),
            
            // If you need to compile multiple less files just add another array
            array(
                // .less source directory 2
                'less-file' => './public/less/sample2.less',
                
                // .css output directory 2
                'css-file' => './public/css/sample2.css',
                
                // Set formatter
                'formatter' => 'compressed',
            ),
        ),
    ),
);
```
