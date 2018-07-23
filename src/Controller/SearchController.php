<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Entity\Race;
use App\Form\AnnounceType;
use App\Repository\AnnounceRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add('adresse',TextType::class, array('attr' => array('onFocus' => 'geolocate()')))
            ->add('city',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('codePostal',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('departement',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('region',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('streetNumber',HiddenType::class)
            ->add('road',HiddenType::class)
            ->add('country',HiddenType::class)
            ->add('race', EntityType::class, array(
                // looks for choices from this entity
                'class' => Race::class,
                ))
            ->getForm();


        return $this->render('search/searchBar.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/search", name="general_search", methods="GET")
     */
    public function navBarSearch(Request $request)
    {

        if (isset($request->query->get('form')['city'])){
            $searchCity = $request->query->get('form')['city'];
        }else{
            $searchCity = "";
        }
        if (isset($request->query->get('form')['departement'])){
            $searchDepartement = $request->query->get('form')['departement'];
        }else{
            $searchDepartement= "";
        }
        if (isset($request->query->get('form')['region'])){
            $searchRegion = $request->query->get('form')['region'];
        }else{
            $searchRegion = "";
        }

        if (isset($request->query->get('form')['race'])){
            $searchRace = $request->query->get('form')['race'];
        }else{
            $searchRace = "";
        }


        $infoSearchs =[$searchRace,$searchCity,$searchDepartement,$searchRegion];

        $announces = $this->getDoctrine()->getRepository(Announce::class)->findBySearchGlobal($searchCity,$searchDepartement,$searchRegion,$searchRace);
            return $this->render('search.html.twig',['announces' => $announces,'infoSearchs' => $infoSearchs]);


    }





}
