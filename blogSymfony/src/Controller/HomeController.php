<?php

namespace App\Controller;

use DateTime;
use App\Entity\Offer;
use App\Form\NewOfferType;
use App\Repository\OfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(OfferRepository $repo)
    {
        $offers = $repo->findAll();


        return $this->render('home/index.html.twig', [
            "offers" => $offers
        ]);
    }

    /**
     * @Route("/offer/{id}", name="offer")
     */
    public function showOffer(Offer $offer)
    {
        return $this->render('home/offer.html.twig', [
            "offer" => $offer
        ]);
    }

    /**
     * @Route("/newOffer", name="NewOffer")
     */
    public function addRedirect(OfferRepository $repo, EntityManagerInterface $entity, Request $request)
    {
        $offers = $repo ->findAll();
        $offer = new Offer();

        $form = $this->createForm(NewOfferType::class, $offer);
        $offer->setCreation(new DateTime());
        $offer->setMaj(new DateTime());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity->persist($offer);
            $entity->flush();
            
            return $this->redirectToRoute("home");
        }

        return $this->render('home/newOffer.html.twig', [
            'offers' => $offers,
            "form" => $form->createView()
        ]);
    }
}
