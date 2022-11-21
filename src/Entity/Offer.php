<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 2)]
    private ?string $discount = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $dayOfTheYear = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(string $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getDayOfTheYear(): ?int
    {
        return $this->dayOfTheYear;
    }

    public function setDayOfTheYear(int $dayOfTheYear): self
    {
        $this->dayOfTheYear = $dayOfTheYear;

        return $this;
    }
}
