"use strict";

//defino API
const API_URL = 'api/comments/';


let orderButton = document.querySelector('#button-order-comments');
orderButton.addEventListener("click", function (e) {
    e.preventDefault();
    orderComments();
});



//uso VUE para los comentarios
let app = new Vue({
    el: '#app',
    data: {
        //defino arreglo para almacenar objetos
        commentStorage: [],
        arrayBoolean: true,
    },
    methods: {
        deleteComment: async function (e) {
            deleteComment(e);
        }
    },
});

//uso VUE para el form de insertar comments
let formApp = new Vue({
    el: '#form-comment-insert',
    methods: {
        addComment: async function (e) {
            addComment(e);
        }
    }
});


async function getComments() {
    try {
        let response = await fetch(API_URL + 'songs/' + getSongID());
        if (!response.ok) {
            throw ('error');
        }

        let comments = await response.json();

        //compruebo si comments es un array
        let arrayBoolean = checkIfIsArray(comments);

        if (arrayBoolean) {
            //almaceno comentarios en variable en VUE
            app.commentStorage = comments;
        }
        else {
            app.arrayBoolean = false;
        }
        console.log(app.commentStorage);
        console.log(app.arrayBoolean);
    }
    catch (error) {
        console.log(error);
    }
}

async function orderComments() {
    let order = document.querySelector('#select-order').value;

    try {  
        let response = await fetch(API_URL + 'songs/' + getSongID() + '/order?score-order=5&order=' + order);
        if (response.ok) {
            let comments = await response.json();

            //compruebo si comments es un array
            let arrayBoolean = checkIfIsArray(comments);

            if (arrayBoolean) {
                //almaceno comentarios en variable en VUE
                app.commentStorage = comments;
                console.log(score, order);
            }
            else {
                app.arrayBoolean = false;
            }
        }
        else {
            alert('No se pudo ordenar');
        }
    }
    catch (error) {
        console.log(error);
    }
}

async function addComment(e) {
    e.preventDefault();
    let form = document.querySelector('#form-comment-insert');
    let formData = new FormData(form);

    let song = getSongID();
    let user = getUserID();
    let commentText = formData.get('comment-text');
    let score = formData.get('score');

    if (commentText == '') {
        alert('Rellene los campos');
        return;
    }

    let comment = {
        id_song_fk: song,
        id_user_fk: user,
        commentText: commentText,
        score: score,
    }

    postComment(comment);
}

async function postComment(comment) {
    try {
        let response = await fetch(API_URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(comment),
        });

        if (response.ok) {
            let comment = await response.json();
            app.commentStorage.push(comment);
            //cambia arrayBoolean a true para que entre en la funcion getComments() y vea que es true asi pueda actualizar la lista de comments
            app.arrayBoolean = true;
            getComments();
            alert('El comentario fue enviado');
        }
        else {
            alert('Error, el comentario no pudo ser enviado');
        }
    }
    catch (error) {
        console.log(error);
    }
}

async function deleteComment(e) {
    e.preventDefault();
    let id = e.target.getAttribute('data-id');

    try {
        let response = await fetch(API_URL + id, {
            method: "DELETE",
        });

        if (response.ok) {
            /* //recorre arreglo para borrar el objeto con la id del comentario y asi poder mantener la pagina actualizada
            for (let i = 0; i < app.commentStorage.length; i++) {
                if (app.commentStorage[i].id == id) {
                    //en la posicion (i) del arreglo se borra (1) elemento
                    app.commentStorage.splice(i, 1);
                }
            } */

            alert('Eliminado con exito');
            //llama para actualizar
            getComments();
        }
        else {
            alert('No se pudo eliminar');
        }
    }
    catch (error) {
        console.log(error);
    }
}

function getSongID() {
    let songID = document.querySelector('#song-data-id').getAttribute('data-id');

    return songID;
}

function getUserID() {
    let userID = document.querySelector('#user-data-id').getAttribute('data-id');

    return userID;
}

function checkIfIsArray(array) {
    let arrayBoolean = Array.isArray(array);
    return arrayBoolean;
}


getComments();