<?php

declare(strict_types=1);

namespace App\Security;

class UserIdentity
{
    private string $id;

    private string $username;

    private string $password;

    private string $name;

    public function __construct(
        string $id,
        string $username,
        string $password,
        string $name
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
    }

    public static function getUser(): self
    {
        return new self(
            'db3d8819-c209-4527-845f-30caef59c3bc',
            'superblogger',
            '$argon2i$v=19$m=1024,t=2,p=2$eDdtMzdTLkg2NE14UmJEZg$DoYabjeDTMk9qGwPoY33lJpmGb8YIHMQlOFtoRaZ6O4', //hashed 'password' string
            'Jack'
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return [];
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }

    public function isEqualTo(self $user): bool
    {
        if (!$user instanceof self) {
            return false;
        }

        return
            $this->id === $user->id &&
            $this->password === $user->password;
    }
}
