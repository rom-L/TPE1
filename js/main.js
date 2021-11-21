"use strict";

//defino API
const API_URL = 'api/comments/';


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
        let response = await fetch(API_URL);
        if (!response.ok) {
            throw ('error');
        }
        
        let comments = await response.json();

        //almaceno comentarios en variable global en VUE
        app.commentStorage = comments;
        
    }
    catch(error) {
        console.log(error);
    }
}

getComments();