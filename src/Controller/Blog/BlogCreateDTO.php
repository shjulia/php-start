<?php

declare(strict_types=1);

namespace App\Controller\Blog;

class BlogCreateDTO
{
    public function __construct(
        public string $name,
        public string $alias,
        public string $authorFirstName,
        public string $authorLastName,
        public string $authorPenName
    ) {}
}