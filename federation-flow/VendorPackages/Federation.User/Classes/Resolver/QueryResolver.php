<?php

declare(strict_types=1);

namespace Federation\User\Resolver;

use t3n\GraphQL\ApolloFederation\Resolver\EntitiesQueryTrait;
use t3n\GraphQL\ResolverInterface;

class QueryResolver implements ResolverInterface
{

    use EntitiesQueryTrait;

    protected $users = [
        ['identifier' => 1, 'name' => 'hans'],
        ['identifier' => 2, 'name' => 'dieter'],
        ['identifier' => 3, 'name' => 'Claudia'],
        ['identifier' => 4, 'name' => 'Franzi'],
    ];

    public function users(): array
    {
        return $this->users;
    }
}
