{include file="templates/header.tpl"}


    <main class="main-form">
        <div class="form-user-div">
            <form action="user/verifyRegister" method="POST">
                <h1>Registrarse</h1>

                <div class="form-group">
                    <label>Nombre de usuario:</label>
                    <input type="text" name="username">
                </div>

                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="password">
                </div>

                <button type="submit">Registrarse</button>
            </form>

        </div>

        {*{if $warning == 'Registro exitoso!'}
            <div class="warning-success">
                <h2>{$warning}</h2>
            </div>*}
        {if $warning == 'Registro fallido' || $warning == 'Este nombre de usuario ya existe!'}
            <div class="warning-fail">
                <h2>{$warning}</h2>
            </div>
        {/if}
            
    </main>

{include file="templates/footer.tpl"}