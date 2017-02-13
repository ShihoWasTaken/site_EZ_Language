<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\CommentType;


class CommentController extends Controller {

  public function listAction() {

      // make sure that the user is really connected
      if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        throw $this->createAccessDeniedException();
      }

      $em = $this->getDoctrine()->getManager();
      $comments = $em->getRepository('AppBundle:Comment')->findBy(array(), array('id' => 'DESC'));
      return $this->render('AppBundle:Comment:comment.list.html.twig', array(
                  'comments' => $comments
      ));
  }

  public function editAction($id){

      // make sure that the user is really connected
      if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        throw $this->createAccessDeniedException();
      }

     // Retrieve the comment from database
     // Get Comment by Id
     $em = $this->getDoctrine()->getManager();
     $comment = $em->getRepository('AppBundle:Comment')->findOneById($id);

     if (!$comment) {
         throw $this->createNotFoundException('The comment with the given id does not exist');
     }

     //Create form
     $form = $this->get('form.factory')->create(new CommentType, $comment);

     $request = $this->getRequest();
     $form->handleRequest($request);

     if ($form->isValid()) {
         //Save $page;
         $em->flush();
         return $this->redirectToRoute('app_admin_commentList');
     }

     return $this->render('AppBundle:Comment:comment.edit.html.twig', array(
                 'form' => $form->createView()
     ));
  }

}
