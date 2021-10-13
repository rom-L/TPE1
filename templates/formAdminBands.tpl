<div class="div-form">
    <form class="form-admin" action="admin/bands/add" method="POST">
        <label>Nombre de banda:</label>
        <input type="text" name="band-name" placeholder="Ingrese nombre de banda">

        <label>Debut:</label>
        <input type="text" name="band-debut" placeholder="Ingrese año de debut">

        <label>Álbumes lanzados:</label>
        <input type="text" name="released-albums" placeholder="Ingrese cantidad de albumes">

        <label>Miembros de banda:</label>
        <input type="text" name="band-members" placeholder="Ingrese miembros de la banda">
    

        <button type="submit">Agregar</button>
    </form>


    <form class="form-admin form-editar" action="admin/bands/edit" method="POST">
        <label>ID para editar:</label>
        <select name="band-id-select">
            {foreach from=$bands item=$band}
                <option value="{$band->id}">{$band->id} - ({$band->band_name})</option>
            {/foreach}
        </select>
        
        <label>Nombre de banda:</label>
        <input type="text" name="band-name" placeholder="Ingrese nombre de banda">

        <label>Debut:</label>
        <input type="text" name="band-debut" placeholder="Ingrese año de debut">

        <label>Álbumes lanzados:</label>
        <input type="text" name="released-albums" placeholder="Ingrese cantidad de albumes">

        <label>Miembros de banda:</label>
        <input type="text" name="band-members" placeholder="Ingrese miembros de la banda">


        <button type="submit">Editar</button>
    </form> 
</div>

    
