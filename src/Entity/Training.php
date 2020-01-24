<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="text")
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="time")
     */
    private $duration;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $costs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\lesson", mappedBy="lesson", orphanRemoval=true)
     */
    private $lesson;

    public function __construct()
    {
        $this->lesson = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCosts(): ?string
    {
        return $this->costs;
    }

    public function setCosts(?string $costs): self
    {
        $this->costs = $costs;

        return $this;
    }

    /**
     * @return Collection|lesson[]
     */
    public function getLesson(): Collection
    {
        return $this->lesson;
    }

    public function addLesson(lesson $lesson): self
    {
        if (!$this->lesson->contains($lesson)) {
            $this->lesson[] = $lesson;
            $lesson->setLesson($this);
        }

        return $this;
    }

    public function removeLesson(lesson $lesson): self
    {
        if ($this->lesson->contains($lesson)) {
            $this->lesson->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getLesson() === $this) {
                $lesson->setLesson(null);
            }
        }

        return $this;
    }
}
