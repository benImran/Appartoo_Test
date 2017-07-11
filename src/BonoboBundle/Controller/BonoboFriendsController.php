<?php

namespace BonoboBundle\Controller;

use BonoboBundle\Entity\BonoboFriends;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bonobofriend controller.
 *
 * @Route("bonobofriends")
 */
class BonoboFriendsController extends Controller
{
    /**
     * Lists all bonoboFriend entities.
     *
     * @Route("/", name="bonobofriends_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bonoboFriends = $em->getRepository('BonoboBundle:BonoboFriends')->findAll();

        return $this->render('bonobofriends/index.html.twig', array(
            'bonoboFriends' => $bonoboFriends,
        ));
    }

    /**
     * Creates a new bonoboFriend entity.
     *
     * @Route("/new", name="bonobofriends_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bonoboFriend = new BonoboFriends();
        $form = $this->createForm('BonoboBundle\Form\BonoboFriendsType', $bonoboFriend);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bonoboFriend);
            $em->flush();

            return $this->redirectToRoute('bonobofriends_show', array('id' => $bonoboFriend->getId()));
        }

        return $this->render('bonobofriends/new.html.twig', array(
            'bonoboFriend' => $bonoboFriend,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bonoboFriend entity.
     *
     * @Route("/{id}", name="bonobofriends_show")
     * @Method("GET")
     */
    public function showAction(BonoboFriends $bonoboFriend)
    {
        $deleteForm = $this->createDeleteForm($bonoboFriend);

        return $this->render('bonobofriends/show.html.twig', array(
            'bonoboFriend' => $bonoboFriend,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bonoboFriend entity.
     *
     * @Route("/{id}/edit", name="bonobofriends_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BonoboFriends $bonoboFriend)
    {
        $deleteForm = $this->createDeleteForm($bonoboFriend);
        $editForm = $this->createForm('BonoboBundle\Form\BonoboFriendsType', $bonoboFriend);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bonobofriends_edit', array('id' => $bonoboFriend->getId()));
        }

        return $this->render('bonobofriends/edit.html.twig', array(
            'bonoboFriend' => $bonoboFriend,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bonoboFriend entity.
     *
     * @Route("/{id}", name="bonobofriends_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BonoboFriends $bonoboFriend)
    {
        $form = $this->createDeleteForm($bonoboFriend);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bonoboFriend);
            $em->flush();
        }

        return $this->redirectToRoute('bonobofriends_index');
    }

    /**
     * Creates a form to delete a bonoboFriend entity.
     *
     * @param BonoboFriends $bonoboFriend The bonoboFriend entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BonoboFriends $bonoboFriend)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bonobofriends_delete', array('id' => $bonoboFriend->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
