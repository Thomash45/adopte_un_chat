<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Form\AnnounceType;
use App\Repository\AnnounceRepository;
use App\Service\Geocoder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("user/announce")
 */
class AnnounceController extends Controller
{
    /**
     * @Route("/", name="announce_index", methods="GET")
     */
    public function index(AnnounceRepository $announceRepository): Response
    {
        $user = $this->getUser();

        return $this->render('announce_user/index.html.twig', ['announces' => $announceRepository->findBy(array('author'=>$user), $orderBy = ['id'=>'DESC'], $limit = null, $offset = null)]);
    }

    /**
     * @Route("/new", name="announce_new", methods="GET|POST")
     */
    public function new(Request $request, Geocoder $geocoder): Response
    {
        $announce = new Announce();
        $user = $this->getUser();
        $form = $this->createForm(AnnounceType::class, $announce);
        $form->handleRequest($request);
        $announce->setAuthor($user);
        $announce->setIsPremium(false);
        $announce->setIsValid(false);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $adresse = $form->get('adresse')->getData();
            $dataGeo = $geocoder->geocodeAddress($adresse);

            $announce->setLat(floatval($dataGeo['lat']));
            $announce->setLng(floatval($dataGeo['lng']));

            $em->persist($announce);
            $em->flush();

            return $this->redirectToRoute('announce_index');
        }

        return $this->render('announce_user/new.html.twig', [
            'announce' => $announce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="announce_show", methods="GET")
     */
    public function show(Announce $announce): Response
    {
        return $this->render('announce_user/show.html.twig', ['announce' => $announce]);
    }

    /**
     * @Route("/{id}/edit", name="announce_edit", methods="GET|POST")
     */
    public function edit(Request $request, Announce $announce): Response
    {
        $form = $this->createForm(AnnounceType::class, $announce);
        $form->handleRequest($request);

        $premium = $announce->getIsPremium();

        if ($premium == true){
            $announce->setIsPremium(true);
        }else{

            $announce->setIsPremium(false);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('announce_show', ['id' => $announce->getId()]);
        }

        return $this->render('announce_user/edit.html.twig', [
            'announce' => $announce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="announce_delete", methods="DELETE")
     */
    public function delete(Request $request, Announce $announce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$announce->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($announce);
            $em->flush();
        }

        return $this->redirectToRoute('announce_index');
    }
}
