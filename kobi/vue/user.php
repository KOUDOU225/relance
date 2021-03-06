<div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <!--<a style="cursor:default;"><strong>info@akassoh.ci</strong></a>-->
                            <?php  
                                if(isset($_SESSION['login'])&& isset($_SESSION['Mot_de_passe']))
                                    {  
                                         echo'<a style="cursor:default;"><strong>' .  ' '.$_SESSION['login'].'     </strong></a> ';
                                     }
                            ?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../connexion/logout.php"><i class="fa fa-fw fa-sign-out"></i>Deconnexion</a>
                        </li>
                    </ul>
                </div>