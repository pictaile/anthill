<?php

namespace AnthillTendersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TendersCategory
 */
class TendersCategory
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
     * @return TendersCategory
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
     * @return TendersCategory
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
     * @return TendersCategory
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
     * @return TendersCategory
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
}
