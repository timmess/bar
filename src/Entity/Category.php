<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use http\Exception\InvalidArgumentException;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    const NORMAL ='normal';
    const SPECIAL = 'special';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Beer::class, inversedBy="categories")
     */
    private $beer;

    /**
     * @ORM\Column(type="string", length=100, options={"default": "normal"})
     */
    private $term;

    public function __construct()
    {
        $this->beer = new ArrayCollection();
        $this->setTerm(self::NORMAL);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Beer[]
     */
    public function getBeer(): Collection
    {
        return $this->beer;
    }

    public function addBeer(Beer $beer): self
    {
        if (!$this->beer->contains($beer)) {
            $this->beer[] = $beer;
        }

        return $this;
    }

    public function removeBeer(Beer $beer): self
    {
        $this->beer->removeElement($beer);

        return $this;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(string $term): self
    {
        if (!in_array($term, [self::NORMAL, self::SPECIAL])){
            throw new \InvalidArgumentException("mauvais term utilisé");
        }
        $this->term = $term;

        return $this;
    }
}
