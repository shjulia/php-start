<?php

declare(strict_types=1);

namespace App\Controller\Blog;

use App\Security\UserIdentity;
use App\Services\BlogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blog')]
class BlogController extends AbstractController
{
    public function __construct(
        private BlogService $blogService
    ) {}

    #[Route('/create', methods: ["POST"])]
    public function create(Request $request): Response
    {
        $blog = json_decode($request->getContent(), true);

        $this->blogService->saveBlog(
            $blog,
            UserIdentity::getUser()->getId()
        );

        return $this->json([], Response::HTTP_CREATED);
    }
}