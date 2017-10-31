<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\MainTest;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="start")
     */
    public function startAction(Request $request)
    {
        return $this->render('start.html.twig');
    }

    /**
     * @Route("/resultGet", name="resultGet")
     */
    public function resultGetAction(Request $request, maintest $maintest)
    {
        $ArrayTestResults = array();
        $CacheResult = $maintest->testonGet('Cache');
        $ExcelResult = $maintest->testonGet('Excel');
        $JsonTestResult = $maintest->testonGet('Json');
        $MysqlResult = $maintest->testonGet('Mysql');
        $TextResuslt = $maintest->testonGet('Text');
        array_push($ArrayTestResults, $CacheResult, $ExcelResult, $JsonTestResult, $MysqlResult, $TextResuslt);

        return $this->render('resultGet.html.twig', [
            'ArrayTestResults' => $ArrayTestResults
        ]);
    }

    /**
     * @Route("/resultSet", name="resultSet")
     */
    public function resultSetAction(Request $request, maintest $maintest)
    {

        $JsonResult = $maintest->testonSet('Json');
        // $MysqlResult = teston('Mysql');
        // $TextResuslt = teston('Text');
        // $CacheResult = teston('Cache');
        // $ExcelResult = teston('Excel');

        return $this->render('resultSet.html.twig', [
            'JsonResult' => $JsonResult,
        ]);
    }
}
