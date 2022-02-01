<?php

declare(strict_types=1);

namespace App\Services;

use App\Controller\Blog\BlogDTO;
use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class BlogService
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function saveBlog(BlogDTO $blogData, string $userId): void
    {
        $blog = new Blog(
            Uuid::uuid4()->toString(),
            $blogData->name,
            $blogData->alias,
            $userId,
            $blogData->authorFirstName,
            $blogData->authorLastName,
            $blogData->authorPenName,
        );

        $this->em->persist($blog);
        $this->em->flush();
    }
}