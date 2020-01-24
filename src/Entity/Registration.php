<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistrationRepository")
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lesson", inversedBy="registration")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lesson;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="registration")
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    public function setLesson(?Lesson $lesson): self
    {
        $this->lesson = $lesson;

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
