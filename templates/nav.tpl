<nav class="opciones">
    <ul class="navegacion">
        <li><a href="listar/all">HOME</a></li>
        {if isset($smarty.session.USER_ID)} <!-- $_SESSION['USER_ID'] -->
            <li><a href="admin/songs">ADMIN: CANCIONES</a></li> 
            <li><a href="admin/bands">ADMIN: BANDAS</a></li>
        {/if}
    </ul>
</nav>