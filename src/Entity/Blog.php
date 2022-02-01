<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "blog_blogs")]
class Blog
{
    #[ORM\Id]
    #[ORM\Column(type: 'guid')]
    private string $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\Column()]
    private string $alias;

    #[ORM\OneToOne(inversedBy: "blog", targetEntity: "Author", cascade: ["persist"])]
    #[ORM\JoinColumn(name: "author_id", referencedColumnName: "id")]
    private Author $author;

    #[ORM\ManyToOne(targetEntity: "Category", inversedBy:"blogs")]
    #[ORM\JoinColumn(name: "category_id", referencedColumnName: "id")]
    private Category $category;

    public function __construct(
        string $id,
        string $name,
        string $alias,
        string $authorId,
        string $authorFirstName,
        string $authorLastName,
        string $authorPenName
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->author = new Author($authorId, $authorFirstName, $authorLastName, $authorPenName, $this);
    }

    public function update(
        string $name,
        string $alias,
        Category $category
    ): void {
        $this->name = $name;
        $this->alias = $alias;
        $this->category = $category;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}