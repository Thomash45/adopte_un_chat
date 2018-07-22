<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Form\AnnounceType;
use App\Repository\AnnounceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/search")
 */
class SearchController extends Controller
{
    /**
     * @Route("/", name="announce_findall", methods="GET")
     */
    public function findAllAnnounce(AnnounceRepository $announceRepository): Response
    {
        return $this->render('search.html.twig', ['announces' => $announceRepository->findAll()]);
    }

    public function searchBar()
    {

        $form = $this->createFormBuilder(null)
            ->setMethod('GET')
            ->add('name',TextType::class)
            ->getForm();

        return $this->render('search/searchBar.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/search", name="general_search", methods="GET")
     */
    public function navBarSearch(Request $request)
    {
       // var_dump($request->query->get('form')['name']);
        //die();

        $search = $request->query->get('form')['name'];
        $announces = $this->getDoctrine()->getRepository(Announce::class)->findBySearchField($search);
        return $this->render('search.html.twig',['announces' => $announces]);
    }





}
