<?php

class SchedulingController extends Controller
{

    public function index()
    {
        if ($this->helpers["UserSession"]->has()) {
            $this->setLayout("site/shared/layout.php");
            $this->view("site/scheduling/index.php");
        } else {
            
            $userData = new UserData;
            $users = $userData->getAllUsers();

            $this->setLayout("site/shared/layout.php");
            $this->view("site/scheduling/list.php", array(
                'users' => $users
            ));
        }
    }

    public function viewPage($params)
    {

        $userData = new UserData;
        $user = $userData->getById($params[0]);

        if(!$user){
            header("Location: " . $this->helpers["URLHelper"]->getURL("/scheduling"));
            exit;
        }

        $this->setLayout("site/shared/layout.php");
        $this->view("site/scheduling/index.php", array(
            'readonly' => true
        ));
    }

    public function getEvents()
    {
        if ($this->helpers["UserSession"]->has()) {

            $id = isset($_POST["id"]) ? addslashes($_POST["id"]) : null;

            $eventData = new EventScheduleData;
            $events = $eventData->getEvents($id ? $id : $this->helpers["UserSession"]->get('id'));

            echo json_encode(array(
                'events' => $events
            ));
        } else {

            if(!isset($_POST["id"])){
                http_response_code(403);
                echo json_encode(array(
                    "error" => "Falta de parâmetros necessários para o cadastro"
                ));
                exit;
            }

            $id = isset($_POST["id"]) ? addslashes($_POST["id"]) : null;

            $eventData = new EventScheduleData;
            $events = $eventData->getEventsWithoutDescription($id);

            echo json_encode(array(
                'events' => $events
            ));
        }
    }

    public function addEvent()
    {
        if (!$this->helpers["UserSession"]->has()) {
            http_response_code(401);
            exit;
        }

        if (isset($_POST['idEvent']) && isset($_POST['dateFrom']) && isset($_POST['dateTo']) && isset($_POST['title']) && isset($_POST['description'])) {

            $idEvent     = addslashes($_POST['idEvent']);
            $dateFrom    = addslashes($_POST['dateFrom']);
            $dateTo      = addslashes($_POST['dateTo']);
            $title       = addslashes($_POST['title']);
            $description = addslashes($_POST["description"]);

            $eventCrud = new EventScheduleCrud();
            $response  = $eventCrud->submit($idEvent, $dateFrom, $dateTo, $title, $description, $this->helpers["UserSession"]->get('id'));

            echo json_encode(array(
                "response" => $response
            ));
        } else {
            http_response_code(403);

            echo json_encode(array(
                "error" => "Falta de parâmetros necessários para o cadastro"
            ));
        }
    }

    public function updateEvent()
    {
        if (!$this->helpers["UserSession"]->has()) {
            http_response_code(401);
            exit;
        }

        if (isset($_POST['idEvent']) && isset($_POST['dateFrom']) && isset($_POST['dateTo']) && isset($_POST['title']) && isset($_POST['description'])) {

            $idEvent     = addslashes($_POST['idEvent']);
            $dateFrom    = addslashes($_POST['dateFrom']);
            $dateTo      = addslashes($_POST['dateTo']);
            $title       = addslashes($_POST['title']);
            $description = addslashes($_POST["description"]);

            $eventCrud = new EventScheduleCrud();
            $response  = $eventCrud->update($idEvent, $dateFrom, $dateTo, $title, $description, $this->helpers["UserSession"]->get('id'));

            echo json_encode(array(
                "response" => $response
            ));
        } else {
            http_response_code(403);

            echo json_encode(array(
                "error" => "Falta de parâmetros necessários para o cadastro"
            ));
        }
    }

    public function removeEvent()
    {
        if (!$this->helpers["UserSession"]->has()) {
            http_response_code(401);
            exit;
        }

        if (isset($_POST['idEvent'])) {

            $idEvent = addslashes($_POST['idEvent']);

            $eventCrud = new EventScheduleCrud();
            $response  = $eventCrud->delete($idEvent, $this->helpers["UserSession"]->get('id'));

            echo json_encode(array(
                "response" => $response
            ));
        } else {
            http_response_code(403);

            echo json_encode(array(
                "error" => "Falta de parâmetros necessários para o cadastro"
            ));
        }
    }
}
