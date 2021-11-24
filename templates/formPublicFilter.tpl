<div class="div-form">
    <form class="form-public" action="listar/songsByBand" method="GET">
        <div class="buttons-form-public">
            <button type="button"><a href="listar/all?page=1">Ver todos</a></button>
            <button type="button"><a href="listar/songs">Ver canciones</a></button>
            <button type="button"><a href="listar/bands">Ver categorías</a></button>
        </div>
        
        <div class="search-band">
            <label>Buscar canciones de banda:</label>
            <select name="band-select">
                    {foreach from=$bandsAvailable item=$band}
                        <option value="{$band}">{$band}</option>
                    {/foreach}  
            </select>

            <button type="submit">Buscar</button>
        </div>
    </form>

    <div class="filters">
        <form action="listar/filter/basic" method="POST">
            <div class="filter-container">
                <input type="text" name="basic-filter-value" placeholder="Buscar en todos">
            </div>

            <button type="submit">Buscar</button>
        </form>

        <form action="listar/filter/advanced" method="POST">
            <div class="filter-container">
                <input type="text" name="song-filter-value" placeholder="Canción">
                <input type="text" name="album-filter-value" placeholder="Álbum">
                <input type="text" name="band-filter-value" placeholder="Banda">
                <input type="text" name="debut-filter-value" placeholder="Debut de banda">
                <input type="text" name="released-filter-value" placeholder="Álbumes lanzados">
            </div>

            <button type="submit">Buscar</button>
        </form>
    
    </div>

</div>

    
