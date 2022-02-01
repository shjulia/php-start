<?php

declare(strict_types=1);

namespace App\Controller\Blog;

class BlogEditDTO
{
    public function __construct(
        public string $name,
        public string $alias
    ) {}
}