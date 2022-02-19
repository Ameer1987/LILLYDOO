<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="address_book")
 */
class AddressBook
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
     * @ORM\Column(name="first_name", type="string", nullable=true)
     */
    protected $firstName;

    /** @var
     * string|null
     * @ORM\Column(name="last_name", type="string", nullable=true)
     */
    protected $lastName;

    /** @var
     * string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $street;

    /** @var
     * string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $zip;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id", nullable=false, onDelete="RESTRICT")
     */
    protected $city;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false, onDelete="RESTRICT")
     */
    protected $country;

    /**
     * @var string|null
     * @ORM\Column(name="phone_number", type="string", nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var \DateTimeInterface|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $birthday;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $email;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    protected $picture;

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * {@inheritdoc}
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * {@inheritdoc}
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * {@inheritdoc}
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * {@inheritdoc}
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function setCity(City $city)
    {
        $this->city = $city;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
    }

    /**
     * {@inheritdoc}
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * {@inheritdoc}
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * {@inheritdoc}
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * {@inheritdoc}
     */
    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }
}
