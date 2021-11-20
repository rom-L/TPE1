{include file="templates/header.tpl"}


    <main class="main-list">

        {include file="templates/formPublic.tpl"}

        <table class="elem-table">
            <thead>
                <tr>
                    <td>Canción</td>
                    <td>Álbum</td>
                    <td>Duración</td>
                    <td>Fecha de Lanzamiento</td>
                </tr>
            </thead>

            <tbody>
                {foreach from=$songs item=$song}
                    <tr>
                        <td>{$song->song_name}</td>
                        <td>{$song->album_name}</td>
                        <td>{$song->song_length}</td>
                        <td>{$song->song_release_date}</td>
                    </tr>                   
                {/foreach}
            </tbody>
        </table>


        <section class="comment-list-section">
        
            <div class="comment-list-container">
                <h1>Comentarios</h1>

                <div class="comment-list">
                    <!--HUECO CSR-->
                    <article>
                        <div class="user-details">
                            <img src="img/user-pfp.png" alt="foto de usuario">
                            <p>username</p>
                        </div>

                        <div class="comment-and-actions">
                            <div class="comment">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ut exercitationem aliquid unde rerum architecto, dignissimos dolores qui, explicabo eius sed, totam doloribus? Ipsa nihil soluta assumenda expedita magni dignissimos.</p>
                            </div>

                            {if isset($smarty.session.USER_ID) && ($smarty.session.USER_PERMISSION == 1)}
                                <div class="actions">
                                    <button>Eliminar</button>
                                </div>
                    
                            {/if}

                        </div>
                    </article>
                    
                </div>

            </div>


            {if isset($smarty.session.USER_ID)}
                <div class="form-comments-container">
                    <form class="form-comments">
                        <div class="score-select-container">
                            <label>Puntaje: </label>
                            <select name="score">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>                
                        </div>

                        <div class="comment-text-container">
                            <label>Comentario: </label>
                            <textarea name="comment-text" cols="30" rows="10"></textarea>
                            <button type="submit">Comentar</button>
                        </div>
                    </form>
                
                </div>

            {/if}

        </section>


    </main>

    <script src="js/main.js"></script>

{include file="templates/footer.tpl"}