<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 11/07/18
 * Time: 23:38
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class indexControler extends AbstractController
{
    /**
     * @Route("/")
     */
    public function number()
    {
        $number = 45;

        return $this->render('index.html.twig', array(
            'number' => $number,
        ));
    }
}

