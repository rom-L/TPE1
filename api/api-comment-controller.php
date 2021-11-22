<?php

require_once 'Models/commentModel.php';
require_once 'api/api-view.php';
require_once 'Helpers/userHelper.php';

class ApiCommentController {
    private $model;
    private $view;


    public function __construct() {
        $this->model = new CommentModel();
        $this->view = new ApiView();
    }
    

    function getAll($params = null) {
        $id = $params[':ID'];
        $comments = $this->model->getAllComments($id);
        
        if ($comments) {
            $this->view->response($comments, 200);
        }
        else {
            $this->view->response("No comments found for song with ID = $id", 200);
        }
    }


    function getOne($params = null) {
        $id = $params[':ID'];

        $comment = $this->model->getCommentByID($id);

        if ($comment) {
            $this->view->response($comment, 200);
        }
        else {
            $this->view->response("Comment = $id not found", 404);
        }
    }

    function delete($params = null) {
        $id = $params[':ID'];

        $comment = $this->model->getCommentByID($id);


        if ($comment) {
            $this->model->deleteComment($id);
            $this->view->response("Comment $id deleted successfully!", 200);
        }
        else {
            $this->view->response("Comment $id not found", 404);
        }
    }

    /**
     * Leo el body del request
     */
    function getBody() {
        //se usa para obtener los datos ingresados
        $data = file_get_contents("php://input");

        //devuelve objeto 
        return json_decode($data);
    }

    function insert($params = null) {
        // devuelve objeto enviado por POST
        $data = $this->getBody();

        $song = $data->id_song_fk;
        $user = $data->id_user_fk;
        $comment = $data->commentText;
        $score = $data->score;

        //inserta comentario y obtiene la id del ultimo objeto insertado
        $id = $this->model->postComment($song, $user, $comment, $score);

        //busca ultimo comentario insertado para comprobar si existe o no
        $comment = $this->model->getCommentByID($id);

        if ($comment) {
            $this->view->response($comment, 200);
        }
        else {
            $this->view->response("El comentario no pudo ser creado", 404);
        }


    }
}