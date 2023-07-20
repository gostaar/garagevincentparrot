<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Garage;
use App\Entity\Contact;
use App\Entity\Horaire;
use App\Entity\Voiture;
use App\Repository\ContactRepository;
use App\Repository\HoraireRepository;
use App\Repository\VoitureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    #[Route('/page_contact', name: 'page_contact')]
    public function contact(Contact $contact, ContactRepository $contactR): Response
    {
        $contact = new contact();
        $form = $this->createForm(Contact::class, $contact); 
        return $this->render('page/contact.html.twig', [
            'contactr' => $contactR->findAll(),
            'contact' => $contact,
            'comment_form' => $form,
        ]);
    }

    #[Route('/page_cgu', name: 'page_cgu')]
    public function cgu(): Response
    {
        return $this->render('page/cgu.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/test', name: 'hgarage')]
    public function test(Garage $garage, Voiture $voiture, VoitureRepository $voitures, Environment $twig, Horaire $horaire, HoraireRepository $horaires ): Response
    {
        return new Response($twig->render('partials/voiture.html.twig', [
            'garage' => $garage,
            'voiture' => $voiture,
            'voitures' => $voitures->findAll(),

            'equipements' => $voiture->getEquipements(),
            'caracteristique' => $voiture->getCaracteristique(),
            'galerie' => $voiture->getGalerieImage(),

        ]));
    }

    #[Route('/', name: 'home')]
    public function garage(Garage $garage, Voiture $voiture, VoitureRepository $voitures, Environment $twig,  ): Response
    {
        return new Response($twig->render('page/garage.html.twig', [
            'garage' => $garage,
            'voiture' => $voiture,
            'voitures' => $voitures->findAll(),

            'equipements' => $voiture->getEquipements(),
            'caracteristique' => $voiture->getCaracteristique(),
            'galerie' => $voiture->getGalerieImage(),

        ]));
      } 
      #[Route('/voiture', name: 'voiture_index')]
      public function voiture(Environment $twig, Voiture $voiture, VoitureRepository $voitureRepository): Response
      {
          return new Response($twig->render('partials/voiture.html.twig', [
              'voiture' => $voiture,
              'voitures' => $voitureRepository->findAll(),
              
               'equipements' => $voiture->getEquipements(),
              'caracteristique' => $voiture->getCaracteristique(),
              'galerie' => $voiture->getGalerieImage(),
          ]));
      }
      
      #[Route('/voiture/{id}', name: 'voiture')]
      public function Voituredetails(Environment $twig, Voiture $voiture, VoitureRepository $voitureRepository): Response
      {
          return new Response($twig->render('page/detailsVoiture.html.twig', [
              'voiture' => $voiture,
              'voitures' => $voitureRepository->findBy(['prix' => $voiture->getPrix()]),
              'equipements' => $voiture->getEquipements(),
              'caracteristique' => $voiture->getCaracteristique(),
              'galerie' => $voiture->getGalerieImage(),
          ]));
      } 
}