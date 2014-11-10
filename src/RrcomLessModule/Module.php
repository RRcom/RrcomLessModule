<?php
namespace RrcomLessModule;

use Zend\Mvc\MvcEvent;
use RrcomLessCompiler\LessCompiler;

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
        $lessCompiler = new LessCompiler();
        return $lessCompiler->compile($this->config);
    }
}
