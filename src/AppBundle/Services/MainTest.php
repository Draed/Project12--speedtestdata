<?php

namespace AppBundle\Services;

use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Services\Cache;
use AppBundle\Services\Excel;
use AppBundle\Services\Json;
use AppBundle\Services\Mysql;
use AppBundle\Services\Text;
use AppBundle\Entity\Test;

class MainTest {

    private $doctrine;
    private $logger;
    private $Cache;
    private $Excel;
    private $Json;
    private $Mysql;
    private $Text;
    private $Test;
    
    public function __construct(EntityManagerInterface $doctrine, LoggerInterface $logger, Cache $Cache, Excel $Excel, Json $Json, Mysql $Mysql, Text $Text) {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
        $this->Cache = $Cache;
        $this->Excel = $Excel;
        $this->Json = $Json;
        $this->Mysql = $Mysql;
        $this->Text = $Text;

    }
   public function StartTest() {
        $CPUBefore = memory_get_usage();
        $time_start = microtime();
        $this->logger->info('memory use before : '.$CPUBefore);
        $this->logger->info('time at start : '.$time_start);

        $startInfo = array(
            "CPU"    => $CPUBefore,
            "Time"  => $time_start,
        );
        return $startInfo;
    }

   public function EndTest() {
        $CPUAfter = memory_get_usage();
        $time_end = microtime();
        $this->logger->info('memory use after : '.$CPUAfter);
        $this->logger->info('time at end : '.$time_end);

        $endInfo = array(
            "CPU"    => $CPUAfter,
            "Time"  => $time_end,
        );
        return $endInfo;
    }

    public function ResultTest($startInfo, $endInfo, $testname) {

        $Test = New Test;
        $Test->setTestName($testname);
        $Test->setCPU($endInfo["CPU"]-$startInfo["CPU"]);
        $Test->setTime($endInfo["Time"]-$startInfo["Time"]);

        return $Test ;
    }

    function testonGet($testway){

        switch ($testway) {

            case 'Cache':
                $this->logger->info('Cache Get function detected');
                $this->logger->info('Cache Test started');

                $startInfo = $this->StartTest();
                $result = $this->Cache->GetDataInCache();
                $endInfo = $this->EndTest();
                
                return $this->ResultTest($startInfo, $endInfo, "Cache");
                break;

            case 'Excel':
                $this->logger->info('Excel Get function detected');
                $this->logger->info('Excel Test started');

                $startInfo = $this->StartTest();
                $result = $this->Excel->GetDataInExcel();
                $endInfo = $this->EndTest();
                
                return $this->ResultTest($startInfo, $endInfo, "Excell");
                break;

            case 'Json':
                $this->logger->info('Json Get function detected');
                $this->logger->info('Json Test started');

                $startInfo = $this->StartTest();
                $result = $this->Json->GetDataInJson();
                $endInfo = $this->EndTest();

                //log the json content
                for ($i=0; $i < count($result->LatestUser) ; $i++) { 
                    $this->logger->info("UserName retrieve : ".$result->LatestUser[$i]->UserName);
                    $this->logger->info("Party_ID retrieve : ".$result->LatestUser[$i]->Party_ID);
                }
                
                return $this->ResultTest($startInfo, $endInfo, "Json");
                break;

            case 'Mysql':
                $this->logger->info('Mysql Get function detected');
                $this->logger->info('Mysql Test started');

                $startInfo = $this->StartTest();
                $result = $this->Mysql->GetDataInMysql();
                $endInfo = $this->EndTest();
                
                //log the Mysql content
                foreach ($result as $value) {
                    $UserName = $value->getUsername();
                    $PartyID = $value->getPartyId();
                    $this->logger->info("Mysql Username retrieve : ".$UserName);
                    $this->logger->info("Mysql party ID retrieve : ".$PartyID);
                }
                
                

                return $this->ResultTest($startInfo, $endInfo, "Mysql");
                break;

            case 'Text':
                $this->logger->info('Text Get function detected');
                $this->logger->info('Text Test started');

                $startInfo = $this->StartTest();
                $result = $this->Text->GetDataInText();
                $endInfo = $this->EndTest();

                //log the text content
                $this->logger->info("Text file content retrieve : ".$result);
                
                return $this->ResultTest($startInfo, $endInfo, "Text");
                break;
            
            default:
                $this->logger->info('Test way not found, test abort');
                $result = null;
                $Test = null;
                break;
        }
    }

    function testonSet($testway){

        switch ($testway) {
            case 'json':
                $this->logger->info('Json Set function detected');
                $result = $Json->SetDataInJson();
                break;
            
            default:
                $this->logger->info('Test way not found, test abort');
                $result = null;
                $Test = null;
                break;
        }
    }
}