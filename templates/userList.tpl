{include file="templates/header.tpl"}



    <main class="main-list">


        {if !empty($users)}
            <section class="user-list-container">
                <h1>Lista de usuarios</h1>

                <div class="user-list">
                    <ul>
                        {foreach from=$users item=$user}
                            <li class="li-user">
                                <div class="user-status-div">
                                    <p>{$user->username}</p>
                                    {if $user->permission == 1}
                                        <p class="admin-indicator">Administrador</p>
                                    {/if}
                                </div>

                                <div class="user-list-buttons">
                                    {if ($smarty.session.USER_ID != $user->id)}
                                        <button><a href="admin/users/delete/{$user->id}">Eliminar</a></button>      
                                                                        
                                        {if $user->permission == 0}
                                            <button><a href="admin/users/changePerms/{$user->id}">Hacer Administrador</a></button>
                                        {else}
                                            <button><a href="admin/users/changePerms/{$user->id}">Remover Administrador</a></button>    
                                        {/if}
                                    {/if}

                                </div>
                            </li> 
                        {/foreach}
                    </ul>
                </div>
            </section>



            <!--<table class="elem-table">
                <thead>
                    <tr>
                        <td>Usuario</td>
                        <td>Permiso</td>
                    </tr>
                </thead>

                <tbody>
                    {foreach from=$users item=$user}
                        <tr>
                            <td>{$user->username}</td>
                            {if $user->permission == 1}
                                <td class="green-highlight">Admin</td>
                            {/if}
                        </tr>                   
                    {/foreach}
                </tbody>
            </table> -->
        {else} 
            <div class="warning-fail">
                <h2>No hay usuarios registrados</h2>
            </div>
        {/if}    

    </main>

{include file="templates/footer.tpl"}