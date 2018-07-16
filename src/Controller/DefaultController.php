<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Repository\AnnounceRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/announce", name="announce_show_all", methods="GET")
     */
    public function showAllAnnounce(AnnounceRepository $announceRepository): Response
    {
        return $this->render('list.html.twig', ['announces' => $announceRepository->findAll()]);
    }

    /**
     * @Route("/announce/{id}", name="announce_show_one", methods="GET")
     */
    public function showOneAnnounce(Announce $announce): Response
    {
        return $this->render('show.html.twig', ['announce' => $announce]);
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

