<nav class="opciones">
    <ul class="navegacion">
        <li id="home-li-nav"><a href="listar/all">HOME</a></li>
        {if isset($smarty.session.USER_ID) && ($smarty.session.USER_PERMISSION == 1)} <!-- $_SESSION['USER_ID'] -->
            <li><a href="admin/songs">ADMIN: CANCIONES</a></li> 
            <li><a href="admin/bands">ADMIN: BANDAS</a></li>
            <li><a href="admin/users">ADMIN: USUARIOS</a></li>
        {/if}
    </ul>
</nav>