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
                        <td id="song-data-id" data-id="{$song->id}">{$song->song_name}</td>
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

                <div class="comment-forms">
                    <form class="form-order-comments" method="GET">
                        <div class="select-asc-desc">
                            <label>Ordenamiento: </label>
                            <select id="select-order" name="order">
                                <option value="ASC">Ascendente</option>
                                <option value="DESC">Descendente</option>
                            </select>
                        </div>

                        <button id="button-order-comments" type="submit">Ordenar</button>
                        <button id="button-restore-comments">Reestablecer</button>
                    </form>


                    <form class="form-filter-comments" method="GET">
                        <div class="filter-score-comments">
                            <label>Filtrar por puntaje: </label>
                            <select id="select-score-filter" name="score-filter">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    
                        <button id="button-filter-comments" type="submit">Filtrar</button>
                    </form>
                </div>
                
                {include file="templates/vue/commentListVue.tpl"}
            
            </div>


            {if isset($smarty.session.USER_ID)}
                <div id="user-data-id" data-id="{$smarty.session.USER_ID}" class="form-comments-container">
                {literal}
                    <form v-on:submit="addComment" id="form-comment-insert" class="form-comments">
                {/literal}
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
                            <button id="comment-button" type="submit">Comentar</button>
                        </div>
                    </form>
                
                </div>

            {/if}

        </section>


    </main>

    <script src="js/main.js"></script>

{include file="templates/footer.tpl"}