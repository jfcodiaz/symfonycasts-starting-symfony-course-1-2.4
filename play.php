<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;


$loader = require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
/*
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
*/
$kernel->boot();
$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

use Yoda\EventBundle\Entity\Event;

$event = new Event();
$event->setName("Darth's surprise birthday party!");
$event->setLocation('Deathstar');
$event->setTime(new DateTime('tomorrow noon'));
$event->setDetails("Ha! Darth HATES surprises");

$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();
/*
$templating = $container->get('templating');

echo $templating->render(
    'YodaEventBundle:Default:index.html.twig', array(
        'firstName' => 'Vader',
        'count' => 10
));
*/
