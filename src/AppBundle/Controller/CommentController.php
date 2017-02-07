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
      //$default    = "http://sentireconcepts.com/images/male_face_128.jpg";
      //$size       = 20;
      
      //rand(10,100)

      //$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->getEmail() ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
      
      return $this->render('AppBundle:Comment:comment.list.html.twig', array(
                  'comments' => $comments
                  //'grav_url'  => $grav_url
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

      // make sure that the user is really connected
      if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        throw $this->createAccessDeniedException();
      }

      $comment = new Comment();

      //Create form
      /*$form = $this->get('form.factory')->create(new CommentType, $comment, array(
          'locale' => $this->get('request')->getLocale())
      );*/

      // it should be used like this, if not no need to extend from controller
      $form = $this->createForm(new CommentType, $comment, array(
          'locale' => $this->get('request')->getLocale()
      ));

      $request = $this->getRequest();
      $form->handleRequest($request);

      if ($form->isValid()) {
          //Save $function;
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
