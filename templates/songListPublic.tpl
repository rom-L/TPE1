{include file="templates/header.tpl"}


    <main class="main-list">

        {include file="templates/formPublic.tpl"}

        {if !empty($songs)}
            <table class="song-table">
                <thead>
                    <tr>
                        <td>Canción</td>
                        <td>Álbum</td>
                    </tr>
                </thead>

                <tbody>
                    {foreach from=$songs item=$song}
                        <tr>
                            <td><a href="showDetails/{$song->id}">{$song->song_name}</a></td>
                            <td>{$song->album_name}</td>
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