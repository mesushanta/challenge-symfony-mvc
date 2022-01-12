<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Master;
use App\Service\Logger;
use App\Service\ToUpper;
use App\Service\ToDash;

class DiController extends AbstractController
{
    /**
     * @Route("/transform", name="transform")
     * @param SessionInterface $session
     * @param Request $request
     * @return Response
     */
    public function index(SessionInterface $session, Request $request): Response
    {
        if($session->get('name')) {
            $name = $session->get('name');
        }
        else {
            $name = 'Stranger';
        }

        $request = Request::createFromGlobals();
        $output = '';
        if($request->isMethod('POST')) {
            if ($request->request->get('input')) {

                $input = $request->request->get('input');
                $do = $request->request->get('do');

                if($do === 'upper') {
                    $transform = new ToUpper();
                }
                if($do === 'dash') {
                    $transform = new ToDash();
                }

                $master = new Master($transform,new Logger());
                $output = $master->transform($input);
//                $master->log($output);
            }
        }
        return $this->render('di/index.html.twig', [
            'name' => $name,
            'output' => $output
        ]);
    }
}
