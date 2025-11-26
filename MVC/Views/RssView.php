<?php

namespace MVC\Views;

class RssView extends ViewFactory
{
    const LAYOUT = <<<HTML
    <?xml version="1.0" encoding="UTF-8"?>
    <rss version="2.0">
    <channel>
    <title>{{title}}</title>
    <link>http://example.ru</link><br>
    </channel>
    </rss>
    HTML;

    protected $replacements;

    public function __construct($decorator)
    {
        $this->replacements = [
            '{{title}}' => $decorator->title(),
            '{{items}}' => $decorator->items(),
        ];
    }

    public function render()
    {
        return str_replace(array_keys($this->replacements), $this->replacements, self::LAYOUT);
    }
}