<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Reply;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ReplyType;

/**
 * @Route(path="/subjects")
 */
class ReplyController extends Controller {
/**
 * @Route(path="/{id}/replyvote/up", methods={"GET"}, name="upvotereply")
 * @Template()
 */
public function upvotereplyAction($id)
{
  $reply= $this->getDoctrine()->getRepository(Reply::class)->find($id);
  $vote= $reply->getVote();
  $vote = $vote+1;
  $reply->setVote($vote);
  $this->getDoctrine()->getManager()->flush();


return $this->redirectToRoute("subject_single", [ 'id' => $reply->getSubject()->getId()]);}

/**
 * @Route(path="/{id}/replyvote/down", methods={"GET"}, name="downvotereply")
 * @Template()
 */
public function downvotereplyAction($id)
{
  $reply= $this->getDoctrine()->getRepository(Reply::class)->find($id);
  $vote= $reply->getVote();
  $vote = $vote-1;
  $reply->setVote($vote);
  $this->getDoctrine()->getManager()->flush();


return $this->redirectToRoute("subject_single", [ 'id' => $reply->getSubject()->getId()]);}



/**
 * @Route(path="/{id}/reply/delete", methods={"GET"}, name="reply_delete")
 * @Template()
 */
public function deleteReplyAction($id)
{
  $reply= $this->getDoctrine()->getRepository(Reply::class)->find($id);
  $deleteReply=$this->getDoctrine()->getManager();
  $deleteReply->remove($reply);
  $deleteReply->flush();

  return $this->redirectToRoute("subject_single", [ 'id' => $reply->getSubject()->getId()]);}
}
