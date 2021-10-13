{include file="templates/header.tpl"}


    <main class="main-list">

        {include file="templates/formAdminSongs.tpl"}

        {if !empty($songs)}
            <table class="song-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Canción</td>
                        <td>Álbum</td>
                        <td>Duración</td>
                        <td>Fecha de lanzamiento</td>
                        <td>ID Banda</td>
                        <td>Eliminar</td>
                    </tr>
                </thead>

                <tbody>
                    {foreach from=$songs item=$song}
                        <tr>
                            <td>{$song->id}</td>
                            <td><a href="showDetails/{$song->id}">{$song->song_name}</a></td>
                            <td>{$song->album_name}</td>
                            <td>{$song->song_length}</td>
                            <td>{$song->song_release_date}</td>
                            <td>{$song->id_band_fk}</td>
                            <td><a href="admin/songs/delete/{$song->id}">Eliminar</a></td>
                        </tr>                   
                    {/foreach}
                </tbody>
            </table>
        {else}
            <div class="warning-fail">
                <h2>No hay datos</h2>
            </div>    
        {/if}

    </main>

{include file="templates/footer.tpl"}