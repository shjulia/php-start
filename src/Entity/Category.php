<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "blog_categories")]
class Category
{
    #[ORM\Id]
    #[ORM\Column(type: "guid")]
    private string $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\OneToMany(mappedBy: "category", targetEntity: "Blog")]
    private Collection $blogs;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function update(string $name): void
    {
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBlogs(): Collection
    {
        return $this->blogs;
    }
}