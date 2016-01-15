<?php
namespace IdeaPool\Controller;

use IdeaPool\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        $ideas = $this->getService('ideapool.storage')->getAll();
        return $this->render('IdeaPool:index:index.html.php', compact('ideas'));
    }

    public function viewAction()
    {
        $idea = $this->getService('ideapool.storage')->getByID($this->getRouteParam('id'));
        return $this->render('IdeaPool:index:view.html.php', compact('idea'));
    }

    public function voteAction()
    {
        $ideaId = $this->getRouteParam('id');
        $ideaDir = $this->getRouteParam('dir');
        $is = $this->getService('ideapool.storage');

        if($ideaDir=='up') {
            $is->voteUp($ideaId);
        } elseif($ideaDir=='down') {
            $is->voteDown($ideaId);
        }
        else {
            throw new \Exception('Wrong Direction');
        }

        return $this->redirectToRoute('List_Ideas');

    }

    public function createAction() {
        return $this->render('IdeaPool:index:create.html.php');
    }

    public function createSubmitAction() {

        $name = $this->post('formName');
        $desc = $this->post('formDesc');

        $this->getService('ideapool.storage')->create(array(
            'name'=>$name,
            'description'=>$desc
        ));

        return $this->redirectToRoute('List_Ideas');
    }
}