<?php

namespace GeekHub\Bundle\Lesson9Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GeekHubLesson9Bundle:Default:index.html.twig');
    }
}
