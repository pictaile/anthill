<?php

namespace AnthillStartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartMenu
 */
class StartMenu
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $href;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return StartMenu
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set href
     *
     * @param string $href
     * @return StartMenu
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get href
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }
    /**
     * @var string
     */
    private $name_ru;

    /**
     * @var string
     */
    private $name_ua;

    /**
     * @var string
     */
    private $name_en;


    /**
     * Set name_ru
     *
     * @param string $nameRu
     * @return StartMenu
     */
    public function setNameRu($nameRu)
    {
        $this->name_ru = $nameRu;

        return $this;
    }

    /**
     * Get name_ru
     *
     * @return string
     */
    public function getNameRu()
    {
        return $this->name_ru;
    }

    /**
     * Set name_ua
     *
     * @param string $nameUa
     * @return StartMenu
     */
    public function setNameUa($nameUa)
    {
        $this->name_ua = $nameUa;

        return $this;
    }

    /**
     * Get name_ua
     *
     * @return string
     */
    public function getNameUa()
    {
        return $this->name_ua;
    }

    /**
     * Set name_en
     *
     * @param string $nameEn
     * @return StartMenu
     */
    public function setNameEn($nameEn)
    {
        $this->name_en = $nameEn;

        return $this;
    }

    /**
     * Get name_en
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->name_en;
    }
    /**
     * @var string
     */
    private $state;


    /**
     * Set state
     *
     * @param string $state
     * @return StartMenu
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * @var string
     */
    private $stat;


    /**
     * Set stat
     *
     * @param string $stat
     * @return StartMenu
     */
    public function setStat($stat)
    {
        $this->stat = $stat;

        return $this;
    }

    /**
     * Get stat
     *
     * @return string
     */
    public function getStat()
    {
        return $this->stat;
    }
}
