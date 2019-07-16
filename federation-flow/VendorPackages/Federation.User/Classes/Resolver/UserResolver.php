<?php

declare(strict_types=1);

namespace Federation\User\Resolver;
use Neos\Flow\Annotations as Flow;

use t3n\GraphQL\ApolloFederation\Resolver\EntitiesQueryTrait;
use t3n\GraphQL\ApolloFederation\Resolver\EntityResolverInterface;
use t3n\GraphQL\ResolverInterface;

class UserResolver implements EntityResolverInterface
{
    protected $users = [
        1 => ['identifier' => 1, 'name' => 'hans'],
        2 => ['identifier' => 2, 'name' => 'dieter'],
        3 => ['identifier' => 3, 'name' => 'Claudia'],
        4 => ['identifier' => 4, 'name' => 'Franzi'],
    ];

    public function __resolveType(): string
    {
        return 'User';
    }

    public function __resolveEntity(array $variables)
    {
        if (isset($variables['identifier'])) {
            $user = $this->users[$variables['identifier']];
            $user['__typename'] = $this->__resolveType();

            return $user;
        }

        return null;
    }
}
