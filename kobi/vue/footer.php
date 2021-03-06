<footer class="cm-footer">
    <span class="pull-left">
     
   <?php  
        if(isset($_SESSION['login'])&& isset($_SESSION['Mot_de_passe']))
        {  
            echo'Connecte en tant que:&nbsp;'. '<strong style="background-color:#111; padding:5px 15px; color:#FFFFFF; font-weight:bold;">' .$_SESSION['login'].'</strong>';
          }
    ?>
    </span>
    <span class="pull-right">&copy; AKASSOH TECHNOLOGIES</span>
</footer>