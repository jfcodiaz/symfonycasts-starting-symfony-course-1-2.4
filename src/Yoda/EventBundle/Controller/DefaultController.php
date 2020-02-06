<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;

class DefaultController extends Controller
{
    public function indexAction($firstName, $count)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('YodaEventBundle:Event');
        $event = $repo->findOneBy(array(
            'name' => "Darth's surprise birthday party!"
        ));
        return $this->render(
            'YodaEventBundle:Default:index.html.twig',
            compact('firstName', 'count', 'event')
        );
    }
}
