<?php

namespace AppBundle\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class Text{

    private $logger;
    private $kernel;
    
    public function __construct( LoggerInterface $logger, KernelInterface $kernel) {
        $this->logger = $logger;
        $this->kernel = $kernel;
    }

    public function GetDataInText() {
        $TextFilePath = $this->kernel->getProjectDir() . '/web/bundles/AppBundle/Datasets/Datasets.txt';   
        $TextFile = fopen($TextFilePath, "r") or die("Unable to open file!");
        $TextfileReadable = fread($TextFile,filesize($TextFilePath));
        fclose($TextFile);
        return $TextfileReadable;
    }

    public function SetDataInText() {
        
    }
}