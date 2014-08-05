<?php
namespace controllers;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class ParserController extends \Phalcon\Mvc\Controller
{

    function indexAction()
    {
        $model = \rdsServices::find(array("order" => 'id'));
        $this->view->setVars([
            'data' => $model,
        ]);
    }

    function addAction()
    {
        $model = new \rdsServices;
        $model->save();

        $model = \rdsServices::find(array("order" => 'id'));
        $model = $model->getLast();
        $this->view->disableLevel(\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT);
        $this->view->setVars([
            'item' => $model,
        ]);

    }

    function deleteAction()
    {

        $id = $this->request->get('id');
        $model = \rdsServices::findFirst("id = '$id'");
        if($model instanceof \rdsServices) {
            $model->delete();
        }

    }

    function updateAction()
    {
        $data  =  $this->request->getPost('data');
        $id  =  $this->request->getPost('id');
        $data = json_decode($data);
        $model = \rdsServices::findFirst(array("id = '$id'"));
        foreach(get_object_vars($data) as $key=>$value) {
          $array[$key] = $value;
        }
        $model->save($array);
        die();
    }
}