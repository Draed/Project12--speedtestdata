<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestRepository")
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="testName", type="string", length=255, nullable=true)
     */
    private $testName;

    /**
     * @var string
     *
     * @ORM\Column(name="CPU", type="string", length=255, nullable=true)
     */
    private $CPU;

    /**
     * @var string
     *
     * @ORM\Column(name="Time", type="string", length=255, nullable=true)
     */
    private $time;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set testName
     *
     * @param string $testName
     *
     * @return Test
     */
    public function setTestName($testName)
    {
        $this->testName = $testName;

        return $this;
    }

    /**
     * Get testName
     *
     * @return string
     */
    public function getTestName()
    {
        return $this->testName;
    }


    /**
     * Set CPU
     *
     * @param string $CPU
     *
     * @return Test
     */
    public function setCPU($CPU)
    {
        $this->CPU = $CPU;

        return $this;
    }

    /**
     * Get CPU
     *
     * @return string
     */
    public function getCPU()
    {
        return $this->CPU;
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return Test
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }
}

