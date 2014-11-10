<?php
namespace RrcomLessCompiler;

use lessc;

class LessCompiler
{
    protected $lessc;

    public function __construct()
    {
        $this->lessc = new lessc();
    }

    public function compile($config)
    {
        if(empty($config['files'])) return;
        foreach($config['files'] as $file) {
            if(!empty($file['less-file']) && is_file($file['less-file'])) {
                $this->lessc->compileFile($file['less-file'], $file['css-file']);
            }
        }
    }
}