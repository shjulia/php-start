<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "blog_authors")]
class Author
{
    #[ORM\Id]
    #[ORM\Column(type: "guid")]
    private string $id;

    #[ORM\Column()]
    private string $firstName;

    #[ORM\Column()]
    private string $lastName;

    #[ORM\Column()]
    private string $penName;

    #[ORM\OneToOne(mappedBy: "author", targetEntity: "Blog")]
    private Blog $blog;

    public function __construct(string $id, string $firstName, string $lastName, string $penName, Blog $blog)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->penName = $penName;
        $this->blog = $blog;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPenName(): string
    {
        return $this->penName;
    }

    public function getBlog(): Blog
    {
        return $this->blog;
    }
}