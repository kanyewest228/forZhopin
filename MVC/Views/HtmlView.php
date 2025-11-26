<?php

namespace MVC\Views;

class HtmlView extends ViewFactory
{
    const LAYOUT = <<<HTML
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
                 <title>{{title}}</title>
    </head>
    <body>
      {{body}}
    </body>
    </html>

    HTML;

    protected $replacements;

    public function __construct($decorator)
    {
        $this->replacements = [
          '{{title}}' => $decorator->title(),
          '{{body}}' => $decorator->body(),
        ];
    }

    public function render()
    {
        return str_replace(array_keys($this->replacements), $this->replacements, self::LAYOUT);
    }
}