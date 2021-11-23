{literal}
    <div id="app" class="comment-list">
        <article v-if="arrayBoolean" v-for="comment in commentStorage">
            <div class="user-details">
                <img class="user-pfp" src="img/user-pfp.png" alt="foto de usuario">
                <p>{{comment.username}}</p>

                <img v-if="comment.score == 1" class="user-score-img" src="img/1-star.png" alt="1 estrella">
                <img v-if="comment.score == 2" class="user-score-img" src="img/2-stars.png" alt="2 estrellas">
                <img v-if="comment.score == 3" class="user-score-img" src="img/3-stars.png" alt="3 estrellas">
                <img v-if="comment.score == 4" class="user-score-img" src="img/4-stars.png" alt="4 estrellas">
                <img v-if="comment.score == 5" class="user-score-img" src="img/5-stars.png" alt="5 estrellas">
            </div>

            <div class="comment-and-actions">
                <div class="comment">
                    <p>{{comment.comment}}</p>
                </div>
{/literal}

                {if isset($smarty.session.USER_ID) && ($smarty.session.USER_PERMISSION == 1)}
                    <div class="actions">
                        {literal}
                            <button v-on:click="deleteComment" id="delete-comment-button" :data-id="comment.id">Eliminar</button>
                        {/literal}
                    </div>

                {/if} 

            </div>
        </article>

        {literal}
        <article v-if="!arrayBoolean">
            <div class="no-comments">
                <div class="warning-fail">
                    <h2>No hay comentarios</h2>
                </div>    
            </div>
        </article>
        {/literal}
        
    </div>
    
    
    


