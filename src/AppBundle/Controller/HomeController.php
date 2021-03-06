<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as Response;


class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) : Response
    {
    	$em = $this->getDoctrine()->getManager();

		$posts = $em->getRepository('AppBundle:Post')->findBy(
		    [],													//Bez WHERE
		    ['id' => 'ASC'],									//ORDER
		    5													//LIMIT
		);

        return $this->render('home/index.html.twig', [
        	'posts' => $posts
        ]);
    }
}
