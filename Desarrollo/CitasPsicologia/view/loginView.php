<?php

include 'public/headerWithoutLogin.php';
?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="public/js/script.js"></script>
<center>
    <form id="login-form" class="bg1" style="margin-top: 100px">
        <h3 class="titles" style="margin-top: 50px" >Login</h3>
        <div class="form-group">
            <input type="text"  onkeypress="return onlyNumbers(event)" minlength="9" maxlength="9" name="identification" id="identification" class="form-control" placeholder="Usuario">
        </div>
        <div class="form-group">
            <input type="Password" name="password" id="password" class="form-control" placeholder="Contraseña">
        </div>
        <br />
        <span id="messageSpanId"  style="color: black;"> </span>
        <br />
        <div>
            <!--<a class="btn btn-success" id="administratorLogin" name="administratorLogin" style="margin-right: 1px;" onclick="login(); return false;">LogIn</a>
            <a class="btn btn-success" href="?controlador=User&accion=showAdministratorMainView">Login</a>-->
            <button type="button"  name="userLoginbtn" id="clientLoginbtn" href="javascript:;"
                    onclick="userLogin($('#identification').val(), $('#password').val());return false;" 
                    class="btn btn-success">Login

            </button>
        </div>      
    </form>
</center>
<div class="col-sm-3">
    <a class="btn btn-success" href="?controlador=User&accion=showIndexView">Atrás</a>
</div>

<?php

include_once 'public/footer.php';
?>