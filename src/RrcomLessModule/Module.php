<?php
namespace RrcomLessModule;

use Zend\Mvc\MvcEvent;
use lessc;

class Module
{
    protected $config = null;

    public function onBootstrap(MvcEvent $e)
    {
        $config = $e->getApplication()->getServiceManager()->get('Config');
        if(empty($config['rrcomlessmodule']) || empty($config['rrcomlessmodule']['enable'])) return;
        $this->config = $config['rrcomlessmodule'];
        $this->writeToFile();
    }

    public function writeToFile()
    {
        $lessc = new lessc();
        if(empty($this->config['files'])) return;
        foreach($this->config['files'] as $file) {
            if(!empty($file['less-file']) && is_file($file['less-file'])) {
                $lessc->compileFile($file['less-file'], $file['css-file']);
            }
        }
    }
}
