"use strict";

//defino API
const API_URL = 'api/comments/';


let form = document.querySelector('#form');
form.addEventListener('submit', addComment);



//uso VUE
let app = new Vue({
    el: '#app',
    data: {
        //defino arreglo para almacenar objetos
        commentStorage: [],
    },
});


async function getComments() {
    try {
        let response = await fetch(API_URL + 'songs/' + getSongID());
        if (!response.ok) {
            throw ('error');
        }

        let comments = await response.json();

        //almaceno comentarios en variable en VUE
        app.commentStorage = comments;
        console.log(app.commentStorage);
    }
    catch (error) {
        console.log(error);
    }
}

async function addComment(e) {
    e.preventDefault();

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

function getSongID() {
    let songID = document.querySelector('#song-data-id').getAttribute('data-id');

    return songID;
}

function getUserID() {
    let userID = document.querySelector('#user-data-id').getAttribute('data-id');

    return userID;
}


getComments();