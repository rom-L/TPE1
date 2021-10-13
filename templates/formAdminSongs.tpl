<div class="div-form">
    <form class="form-admin" action="admin/songs/add" method="POST">
        <label>Nombre de canción:</label>
        <input type="text" name="song-name" placeholder="Ingrese nombre de canción">

        <label>Nombre de álbum:</label>
        <input type="text" name="album-name" placeholder="Ingrese nombre de álbum">

        <label>Duración de canción:</label>
        <input type="text" name="song-length" placeholder="Ingrese duración de canción">

        <label>Fecha de lanzamiento de la canción:</label>
        <input type="text" name="song-release-date" placeholder="Ingrese fecha de lanzamiento">
    
          
        <label>Banda:</label>
        <select name="band-id-select">
                {foreach from=$bands item=$band}
                    <option value="{$band->id}">{$band->band_name} - (ID:{$band->id})</option>
                {/foreach}  
        </select> 

        <button type="submit">Agregar</button>
    </form>


    <form class="form-admin form-editar" action="admin/songs/edit" method="POST">
        <label>ID para editar:</label>
        <select name="song-id-select">
            {foreach from=$songs item=$song}
                <option value="{$song->id}">{$song->id} - ({$song->song_name})</option>
            {/foreach}
        </select>
        
        <label>Nombre de canción:</label>
        <input type="text" name="song-name" placeholder="Ingrese nombre de canción">

        <label>Nombre de álbum:</label>
        <input type="text" name="album-name" placeholder="Ingrese nombre de álbum">

        <label>Duración de canción:</label>
        <input type="text" name="song-length" placeholder="Ingrese duración de canción">

        <label>Fecha de lanzamiento de la canción:</label>
        <input type="text" name="song-release-date" placeholder="Ingrese fecha de lanzamiento">
    
          
        <label>Banda:</label>
        <select name="band-id-select">
                {foreach from=$bands item=$band}
                    <option value="{$band->id}">{$band->band_name} - (ID:{$band->id})</option>
                {/foreach}  
        </select> 

        <button type="submit">Editar</button>
    </form> 
</div>

    
