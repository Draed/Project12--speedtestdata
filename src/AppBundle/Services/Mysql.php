<?php

namespace AppBundle\Services;

use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\LatestUser;

class Mysql{

    private $logger;
    private $doctrine;
    
    public function __construct( LoggerInterface $logger, EntityManagerInterface $doctrine) {
        $this->logger = $logger;
        $this->doctrine = $doctrine;
    }

    public function GetDataInMysql(){
        //data are already in the database with Fixture Bundle
        //if not then launch $ php bin/console doctrine:fixtures:load
        $repository = $this->getDoctrine()->getRepository(LatestUser::class);
        $MysqlData = $repository->findAll();
        return $MysqlData;
    }

}