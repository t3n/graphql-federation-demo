<?php

declare(strict_types=1);

namespace Federation\News;


use t3n\GraphQL\ApolloFederation\GraphQLTypeAwareInterface;

class News implements GraphQLTypeAwareInterface
{
    /**
     * @var int
     */
    protected $identifier;

    /**
     * @var array
     */
    protected $author;

    /**
     * @var string
     */
    protected $title;

    /**
     * News constructor.
     * @param int $identifier
     * @param array $author
     * @param string $title
     */
    public function __construct(int $identifier, array $author, string $title)
    {
        $this->identifier = $identifier;
        $this->author = $author;
        $this->title = $title;
    }

    public function getGraphQLType(): string
    {
        return 'News';
    }

    /**
     * @return int
     */
    public function getIdentifier(): int
    {
        return $this->identifier;
    }

    /**
     * @return array
     */
    public function getAuthor(): array
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
