{include file="templates/header.tpl"}


    <main class="main-list">

        {include file="templates/formPublic.tpl"}

        <table class="song-table">
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

    </main>

{include file="templates/footer.tpl"}