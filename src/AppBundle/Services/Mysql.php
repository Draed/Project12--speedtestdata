<?php

namespace AppBundle\Services;

use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;

class Mysql{

    private $logger;
    
    public function __construct( LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function GetDataInMysql(){
        //data are already in the database with Fixture Bundle
        //if not then launch $ php bin/console doctrine:fixtures:load
        $MysqlData = $repository->findAll();
        return $MysqlData;
    }

}