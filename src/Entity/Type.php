<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $base_strength = null;

    #[ORM\Column]
    private ?int $base_speed = null;

    #[ORM\Column]
    private ?int $base_magic = null;

    #[ORM\Column]
    private ?int $base_defense = null;

    #[ORM\Column]
    private ?int $base_xp = null;

    #[ORM\Column]
    private ?int $base_life = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Character::class)]
    private Collection $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }
    public function __tostring(){
        return $this->name;
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

    public function getBaseStrength(): ?int
    {
        return $this->base_strength;
    }

    public function setBaseStrength(int $base_strength): self
    {
        $this->base_strength = $base_strength;

        return $this;
    }

    public function getBaseSpeed(): ?int
    {
        return $this->base_speed;
    }

    public function setBaseSpeed(int $base_speed): self
    {
        $this->base_speed = $base_speed;

        return $this;
    }

    public function getBaseMagic(): ?int
    {
        return $this->base_magic;
    }

    public function setBaseMagic(int $base_magic): self
    {
        $this->base_magic = $base_magic;

        return $this;
    }

    public function getBaseDefense(): ?int
    {
        return $this->base_defense;
    }

    public function setBaseDefense(int $base_defense): self
    {
        $this->base_defense = $base_defense;

        return $this;
    }

    public function getBaseXp(): ?int
    {
        return $this->base_xp;
    }

    public function setBaseXp(int $base_xp): self
    {
        $this->base_xp = $base_xp;

        return $this;
    }

    public function getBaseLife(): ?int
    {
        return $this->base_life;
    }

    public function setBaseLife(int $base_life): self
    {
        $this->base_life = $base_life;

        return $this;
    }

    /**
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->setType($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getType() === $this) {
                $character->setType(null);
            }
        }

        return $this;
    }
}
