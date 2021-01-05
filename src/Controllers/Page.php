<?php declare(strict_types = 1);

namespace PatrickLouys\Controllers;

use Http\Response;
use PatrickLouys\Page\InvalidPageException;
use PatrickLouys\Page\PageReader;
use PatrickLouys\Template\Renderer;

class Page
{
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(Response $response, Renderer $renderer, PageReader $pageReader)
    {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show($params)
    {
        $slug = $params['slug'];
        try{
            $data['content'] = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent($e->getMessage());
        }
        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}