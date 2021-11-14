{include file="templates/header.tpl"}



    <main class="main-list">


        {if !empty($users)}
            <table class="elem-table">
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
            </table>
        {else}
            <div class="warning-fail">
                <h2>No hay usuarios registrados</h2>
            </div>
        {/if}    

    </main>

{include file="templates/footer.tpl"}