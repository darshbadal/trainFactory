<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $tijd;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_persons;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Training", inversedBy="lesson")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lesson;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\registration", mappedBy="lesson", orphanRemoval=true)
     */
    private $registration;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="lesson")
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    public function __construct()
    {
        $this->registration = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->tijd;
    }

    public function setTijd(\DateTimeInterface $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getMaxPersons(): ?int
    {
        return $this->max_persons;
    }

    public function setMaxPersons(int $max_persons): self
    {
        $this->max_persons = $max_persons;

        return $this;
    }

    public function getLesson(): ?Training
    {
        return $this->lesson;
    }

    public function setLesson(?Training $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }

    /**
     * @return Collection|registration[]
     */
    public function getRegistration(): Collection
    {
        return $this->registration;
    }

    public function addRegistration(registration $registration): self
    {
        if (!$this->registration->contains($registration)) {
            $this->registration[] = $registration;
            $registration->setLesson($this);
        }

        return $this;
    }

    public function removeRegistration(registration $registration): self
    {
        if ($this->registration->contains($registration)) {
            $this->registration->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getLesson() === $this) {
                $registration->setLesson(null);
            }
        }

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }
}
