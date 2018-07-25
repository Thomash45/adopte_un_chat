<?php

namespace App\Controller;

use App\Entity\Announce;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Tests\A;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $announceRepository = $this->getDoctrine()->getRepository(Announce::class);

        return $this->render('index.html.twig', [
            'announces' => $announceRepository->findBy(array('is_valid'=>1), $orderBy = ['id'=>'DESC'], $limit = 3, $offset = null),
            'premium' => $announceRepository->findOneBy(array('is_premium'=>1,'is_valid'=>1))
            ]);
    }

    /**
     * @Route("/details/{id}", name="announce_details")
     */
       public function show($id)
    {
        $announce = $this->getDoctrine()
            ->getRepository(Announce::class)
            ->find($id);

        if (!$announce) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('details.html.twig', ['announce' => $announce]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }



    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }

    /**
     * @Route("/user", name="user")
     */
    public function user()
    {
        return $this->render('User/index.html.twig');
    }


}

