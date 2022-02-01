<?php

declare(strict_types=1);

namespace App\Services;

use App\Controller\Blog\BlogCreateDTO;
use App\Controller\Blog\BlogEditDTO;
use App\Entity\Blog;
use App\Repository\BlogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class BlogService
{
    public function __construct(
        private EntityManagerInterface $em,
        private BlogRepository $blogRepository
    ) {}

    public function saveBlog(BlogCreateDTO $blogData, string $userId): void
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

    public function updateBlog(BlogEditDTO $blogData, string $blogId): void
    {
        $blog = $this->blogRepository->get($blogId);
        $blog->update($blogData->name, $blogData->alias);

        $this->em->flush();
    }
}