<?php

declare(strict_types=1);

namespace App\Controller\Blog;

use App\Entity\Blog;
use App\Security\UserIdentity;
use App\Services\BlogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/blog')]
class BlogController extends AbstractController
{
    public function __construct(
        private BlogService $blogService,
        private SerializerInterface $serializer
    ) {}

    #[Route('/create', methods: ["POST"])]
    public function create(Request $request): Response
    {
        $blog = $this->serializer->deserialize(
            $request->getContent(),
            BlogCreateDTO::class,
            'json',
        );

        $this->blogService->saveBlog(
            $blog,
            UserIdentity::getUser()->getId()
        );

        return $this->json([], Response::HTTP_CREATED);
    }

    #[Route('/{id}/update', methods: ["PUT"])]
    public function update(Request $request, Blog $blog): Response
    {
        $blogData = $this->serializer->deserialize(
            $request->getContent(),
            BlogEditDTO::class,
            'json',
        );

        $this->blogService->updateBlog(
            $blogData,
            $blog->getId()
        );

        return $this->json([], Response::HTTP_OK);
    }
}