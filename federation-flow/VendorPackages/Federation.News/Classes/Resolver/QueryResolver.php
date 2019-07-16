<?php

declare(strict_types=1);

namespace Federation\News\Resolver;

use Federation\News\News;
use t3n\GraphQL\ResolverInterface;

class QueryResolver implements ResolverInterface
{

    protected $news = [
        ['identifier' => 1, 'author' => ['identifier' => 1], 'title' => 'React Hooks: Lohnt die Umstellung auf das Programmier-Konzept?'],
        ['identifier' => 2, 'author' => ['identifier' => 1], 'title' => 'Deutschlands Startups sammeln Rekordsumme ein'],
        ['identifier' => 3, 'author' => ['identifier' => 1], 'title' => 'VW und Ford weiten ihre Allianz aus'],
        ['identifier' => 4, 'author' => ['identifier' => 1], 'title' => '157 Millionen Euro: Frisches Kapital für das Berliner Startup Signavio'],
    ];

    public function allNews(): array
    {
        $news = [];

        foreach ($this->news as $input) {
            $news[] = new News($input['identifier'], $input['author'], $input['title']);
        }

        return $this->news;
    }
}
