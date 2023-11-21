<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $licenseName = null;

    #[ORM\Column(length: 255)]
    private ?string $licenseFirstname = null;

    #[ORM\Column(length: 255)]
    private ?string $licensePicture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    private ?Club $club = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    private ?Team $team = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicenseName(): ?string
    {
        return $this->licenseName;
    }

    public function setLicenseName(string $licenseName): static
    {
        $this->licenseName = $licenseName;

        return $this;
    }

    public function getLicenseFirstname(): ?string
    {
        return $this->licenseFirstname;
    }

    public function setLicenseFirstname(string $licenseFirstname): static
    {
        $this->licenseFirstname = $licenseFirstname;

        return $this;
    }

    public function getLicensePicture(): ?string
    {
        return $this->licensePicture;
    }

    public function setLicensePicture(string $licensePicture): static
    {
        $this->licensePicture = $licensePicture;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): static
    {
        $this->club = $club;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

}
