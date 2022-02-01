<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

class BlogRepository
{
    /**
     * @var EntityRepository<Blog>
     */
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repository = $em->getRepository(Blog::class);
    }

    public function get(string $id): Blog
    {
        $category = $this->repository->find($id);
        if (!$category) {
            throw new EntityNotFoundException('Category not found');
        }

        return $category;
    }
}