<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $clubName = null;

    #[ORM\Column(length: 255)]
    private ?string $sportClub = null;

    #[ORM\Column(length: 255)]
    private ?string $clubAddress = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Team::class)]
    private Collection $team;

    // #[ORM\OneToOne(mappedBy: 'club', cascade: ['persist', 'remove'])]
    // private ?Licencie $licencie = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Licencie::class)]
    private Collection $licencies;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->licencies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->clubName;
    }

    public function setClubName(string $clubName): static
    {
        $this->clubName = $clubName;

        return $this;
    }

    public function getSportClub(): ?string
    {
        return $this->sportClub;
    }

    public function setSportClub(string $sportClub): static
    {
        $this->sportClub = $sportClub;

        return $this;
    }

    public function getClubAddress(): ?string
    {
        return $this->clubAddress;
    }

    public function setClubAddress(string $clubAddress): static
    {
        $this->clubAddress = $clubAddress;

        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(Team $team): static
    {
        if (!$this->team->contains($team)) {
            $this->team->add($team);
            $team->setClub($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): static
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getClub() === $this) {
                $team->setClub(null);
            }
        }

        return $this;
    }

    // public function getLicencie(): ?Licencie
    // {
    //     return $this->licencie;
    // }

    // public function setLicencie(?Licencie $licencie): static
    // {
    //     // unset the owning side of the relation if necessary
    //     if ($licencie === null && $this->licencie !== null) {
    //         $this->licencie->setClub(null);
    //     }

    //     // set the owning side of the relation if necessary
    //     if ($licencie !== null && $licencie->getClub() !== $this) {
    //         $licencie->setClub($this);
    //     }

    //     $this->licencie = $licencie;

    //     return $this;
    // }

    /**
     * @return Collection<int, Licencie>
     */
    public function getLicencies(): Collection
    {
        return $this->licencies;
    }

    public function addLicency(Licencie $licency): static
    {
        if (!$this->licencies->contains($licency)) {
            $this->licencies->add($licency);
            $licency->setClub($this);
        }

        return $this;
    }

    public function removeLicency(Licencie $licency): static
    {
        if ($this->licencies->removeElement($licency)) {
            // set the owning side to null (unless already changed)
            if ($licency->getClub() === $this) {
                $licency->setClub(null);
            }
        }

        return $this;
    }
}
