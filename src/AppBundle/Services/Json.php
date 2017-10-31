<?php

namespace AppBundle\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class Json{

    private $logger;
    private $kernel;
    
    public function __construct( LoggerInterface $logger, KernelInterface $kernel) {
        $this->logger = $logger;
        $this->kernel = $kernel;
    }

    public function GetDataInJson() {

        $jsonpath = $this->kernel->getRootDir() . '/../app/Ressources/Datasets/Datasets.json';        
        $json = file_get_contents($jsonpath);
        $parsed_json = json_decode($json);
        return $parsed_json;

    }    

    public function SetDataInJson() {
        
    }   
}