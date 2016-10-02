<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Reply;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ReplyType;
use AppBundle\Form\Type\SubjectType;


/**
 * @Route(path="/subjects")
 */
class SubjectController extends Controller
{
    /**
     * @Route(path="/", methods={"GET"}, name="subject_index")
     * @Template()
     */
    public function indexAction()
    {
        return [
            'subjects' => $this->getDoctrine()->getRepository(Subject::class)->findNotResolved()
        ];
    }

    /**
     * @Route(path="/new", methods={"GET"}, name="subject_resolvedindex")
     * @Template()
     */
    public function resolvedindexAction(){
      return [
          'subjects' => $this->getDoctrine()->getRepository(Subject::class)->findResolvedNew()
      ];
    }

    /**
     * @Route(path="/addsubject", methods={"GET","POST"}, name="subject_add")
     * @Template()
     */
    public function addsubjectAction(Request $request)
    {

      $subject = new Subject();

       $createSubjectForm = $this->createForm(SubjectType::class, $subject);
       $createSubjectForm->handleRequest($request);
       if ($createSubjectForm->isValid()) {
         $this->getDoctrine()->getManager()->persist($subject);
         $this->getDoctrine()->getManager()->flush();

         return $this->redirectToRoute('subject_index');
       }
       return[
         'createSubjectForm' => $createSubjectForm->createView()
       ];

     }

    /**
     * @Route(path="/{id}", methods={"GET","POST"}, name="subject_single")
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
      $subject = $this->getDoctrine()->getRepository(Subject::class)->find($id);
      $reply = new Reply();
      $reply->setSubject($subject);


       $form = $this->createForm(ReplyType::class, $reply);
       $form->handleRequest($request);
       if ($form->isValid()) {
         $this->getDoctrine()->getManager()->persist($reply);
         $this->getDoctrine()->getManager()->flush();
         return $this->redirectToRoute("subject_single", [ 'id' => $id]);
       };



      return [
        'subject' => $subject,
        'form' => $form->createView()
      ];
    }

    /**
     * @Route(path="/{id}/vote/up", methods={"GET"}, name="subject_upvote")
     * @Template()
     */
    public function upvoteAction($id)
    {
      $subject= $this->getDoctrine()->getRepository(Subject::class)->find($id);
      $vote= $subject->getVote();
      $vote = $vote+1;
      $subject->setVote($vote);
      $this->getDoctrine()->getManager()->flush();


      return $this->redirectToRoute('homepage');
    }

    /**
     * @Route(path="/{id}/vote/down", methods={"GET"}, name="subject_downvote")
     * @Template()
     */
    public function downvoteAction($id)
    {
      $subject= $this->getDoctrine()->getRepository(Subject::class)->find($id);
      $vote= $subject->getVote();
      $vote = $vote-1;
      $subject->setVote($vote);
      $this->getDoctrine()->getManager()->flush();


      return $this->redirectToRoute('homepage');
    }

    /**
     * @Route(path="/{id}/setresolved", methods={"GET"}, name="subject_resolved")
     * @Template()
     */
    public function setresolvedAction($id)
    {
      $subject= $this->getDoctrine()->getRepository(Subject::class)->find($id);
      $subject->setResolved(true);
      $this->getDoctrine()->getManager()->flush();


      return $this->redirectToRoute('homepage');
    }

    /**
     * @Route(path="/{id}/delete", methods={"GET"}, name="subject_delete")
     * @Template()
     */
    public function deleteSubjectAction($id)
    {
      $subject= $this->getDoctrine()->getRepository(Subject::class)->find($id);
      $deleteSubject=$this->getDoctrine()->getManager();
      $deleteSubject->remove($subject);
      $deleteSubject->flush();

      return $this->redirectToRoute('homepage');
    }



   }
