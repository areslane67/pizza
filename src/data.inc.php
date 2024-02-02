<?php try{
      $_bdd=new PDO('mysql:host=localhost;dbname=pizza2;charset=utf8', 'root', '');
           }
              catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }