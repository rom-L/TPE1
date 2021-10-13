<div class="div-form">
    <form class="form-public" action="listar/songsByBand" method="GET">
        <div class="buttons-form-public">
            <button type="button"><a href="listar/all">Ver todos</a></button>
            <button type="button"><a href="listar/songs">Ver canciones</a></button>
            <button type="button"><a href="listar/bands">Ver categorías</a></button>
        </div>
        
        <div class="search-band">
            <label>Buscar canciones de banda:</label>
            <select name="band-select">
                    {foreach from=$elems item=$band}
                        <option value="{$band->band_name}">{$band->band_name}</option>
                    {/foreach}  
            </select>

            <button type="submit">Buscar</button>
        </div>
    </form>
</div>

    
