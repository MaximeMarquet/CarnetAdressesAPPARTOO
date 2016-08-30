<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateurs\UtilisateursBundle\Entity\Contacts;

class ContactsController extends Controller
{
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $contacts = $em->getRepository('UtilisateursBundle:Contacts')->findby(
            array('iduser' => $user->getId())
        );

        return $this->render('UtilisateursBundle:Default:index.html.twig', array('contacts' => $contacts));
    }

    public function ajoutAction(){
        if ($this->get("request")->getMethod() == "POST") {
            $em = $this->getDoctrine()->getManager();

            $contact = new Contacts();
            $contact->setNom($this->get("request")->request->get('name'));
            $contact->setPrenom($this->get("request")->request->get('firstname'));
            $contact->setEmail($this->get("request")->request->get('email'));
            $contact->setAdresse($this->get("request")->request->get('address'));
            $contact->setTel($this->get("request")->request->get('tel'));
            $contact->setSite($this->get("request")->request->get('site'));

            $user = $this->container->get('security.context')->getToken()->getUser();

            $contact->setIduser($user->getId());

            $em->persist($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contacts');
    }

    public function supprAction(){
        if ($this->get("request")->getMethod() == "POST") {
            $em = $this->getDoctrine()->getManager();

            $delete = $em->getRepository('UtilisateursBundle:Contacts')->find($this->get("request")->request->get('id'));

            $em->remove($delete);
            $em->flush();
        }

        return $this->redirectToRoute('contacts');
    }

    public function editAction(){
        if ($this->get("request")->getMethod() == "POST") {
            $em = $this->getDoctrine()->getManager();

            $edit = $em->getRepository('UtilisateursBundle:Contacts')->find($this->get("request")->request->get('id'));
            $edit->setNom($this->get("request")->request->get('name'));
            $edit->setPrenom($this->get("request")->request->get('firstname'));
            $edit->setEmail($this->get("request")->request->get('email'));
            $edit->setAdresse($this->get("request")->request->get('address'));
            $edit->setTel($this->get("request")->request->get('tel'));
            $edit->setSite($this->get("request")->request->get('site'));

            $em->flush();
        }

        return $this->redirectToRoute('contacts');
    }
}
