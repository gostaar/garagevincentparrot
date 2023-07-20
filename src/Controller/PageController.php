<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Garage;
use App\Entity\Contact;
use App\Entity\Horaire;
use App\Entity\Voiture;
use App\Form\ContactType;
use App\Repository\GarageRepository;
use App\Repository\ContactRepository;
use App\Repository\HoraireRepository;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{

    public function __construct(
    private EntityManagerInterface $entityManager,
) {
        }

    #[Route('/page_contact', name: 'page_contact')]
    public function contact(Contact $contact, ContactRepository $contactR): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact); 
        return $this->render('page/contact.html.twig', [
            'contactR' => $contactR->findAll(),
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
    public function garage(Request $request, Garage $garage, GarageRepository $garageR, Voiture $voiture, VoitureRepository $voitures, Environment $twig,  ): Response
    {
        $garage = $garageR->findAll();
        $Voiture = $voitures->findAll();
        $caracteristiques = $voiture->getCaracteristique();
        $equipement = $voiture->getEquipements();
        $galerie = $voiture->getGalerieImage();


        //on récupère les filres
        $filters = $request->get("prix", 1);

        $annonces = $voitures->getAnnonces($filters);
        
        $total = $voitures->getTotal($filters);

        if($request->get('ajax')){
            return new JsonResponse([
                'content' => $this->renderView('page/garage.html.twig')
            ]);
        };
      

        return $this->render('page/garage.html.twig');
            
           
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

      
      #[Route('/horaire/{id}', name: 'horaire')]
      public function horaire(Environment $twig, horaire $horaire, horaireRepository $horaireRepository): Response
      {
          return new Response($twig->render('partials/hor.html.twig', [
              'horaire' => $horaire,
              'horaires' => $horaireRepository->findAll(),
              'jours' => $horaire->getJour(),
              'am' => $horaire->getAm(),
              'pm' => $horaire->getPm(),
          ]));
      } 

      #[Route('/voiture', name: 'voitures')]
      public function Voitures(Environment $twig, Voiture $voiture, VoitureRepository $voitureRepository): Response
      {
          return new Response($twig->render('partials/voiture.html.twig', [
              'voiture' => $voiture,
              'voitures' => $voitureRepository->findBy(['prix' => $voiture->getPrix()]),
              'equipements' => $voiture->getEquipements(),
              'caracteristique' => $voiture->getCaracteristique(),
              'galerie' => $voiture->getGalerieImage(),
          ]));
      } 

}
