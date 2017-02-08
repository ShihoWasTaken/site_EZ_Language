<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\CommentType;
use AppBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class CommentController extends Controller {

  public function listAction() {

      // make sure that the user is really connected
      if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        throw $this->createAccessDeniedException();
      }

      $em = $this->getDoctrine()->getManager();
      $comments = $em->getRepository('AppBundle:Comment')->findAll();
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
         //return $this->redirectToRoute('app_admin_pageList');
     }

     return $this->render('AppBundle:Comment:comment.edit.html.twig', array(
                 'form' => $form->createView()
     ));
  }

  /**
   * Create Function
   *
   * @return
   */
  public function createAction() {

       // build the form
      $comment = new Comment();
      
      // it should be used like this, if not no need to extend from controller
      $form = $this->createForm(new CommentType, $comment, array(
          'locale' => $this->get('request')->getLocale()
      ));

      // handle the submit (will only happen on POST)
        $request = $this->getRequest();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // save the comment!
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('app_admin_commentList');
        }

      return $this->render('AppBundle:Comment:comment.create.html.twig', array(
                  'form' => $form->createView()
      ));

  }


}


?>
