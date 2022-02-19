<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\City", mappedBy="country", orphanRemoval=true, cascade="all")
     */
    protected $cities;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AddressBook", mappedBy="country")
     */
    protected $addresses;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCities(): bool
    {
        return !$this->cities->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function hasCity(City $city): bool
    {
        return $this->cities->contains($city);
    }

    /**
     * {@inheritdoc}
     */
    public function addCity(City $city)
    {
        if (false === $this->hasCity($city)) {
            $city->setCountry($this);
            $this->cities->add($city);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeCity(City $city)
    {
        if ($this->hasCity($city)) {
            $city->setCountry(null);
            $this->cities->removeElement($city);
        }
    }
}
