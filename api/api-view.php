<?php

class ApiView {

    //function para convertir datos a JSON
    function response($data, $code = 200) {
        //avisa al servidor que se esta mandando JSON
        header('Content-Type: application/json');
        //codigo de respuesta
        header("HTTP/1.1 " . $code . " " . $this->requestStatus($code));

        echo json_encode($data);
    }


    /**
     * Devuelve el texto asociado a un codigo de respuesta HTTP
     */
    private function requestStatus($code) {
        $status = [
            200 => "OK",
            400 => "Not Found",
            505 => "Internal Server Error",
        ];

        if (isset($status[$code])) {
            return $status[$code];
        }
        else {
            return $status[505];
        }

    }
}