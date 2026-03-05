<?php

class DefaultController extends AbstractController
{
    public function index() : void
    {

    
    //fonctionne
        $user = new User("Pauline", "Leclerc", "pauline@email.com", "perlimpimpin");
        //ajout de la date du moment dont on changer le format dans UserManager
        $date = new DateTime();
        $user->setCreatedAt($date);
        var_dump($user);
        $manager = new UserManager();
        $user = $manager->create($user);
        
        //Fonctionne
        // $user->setFirstName("Elizabeth");
        // $user = $manager->update($user);
        
        //foncionne : pas de $user entre les parenthèse de delete puisqu'il ne renvoie rien
        $user = $manager -> delete();
        
    
        
//fonctionne
        // $manager = new UserManager();
        // $user = $manager->findOne(2);
        // var_dump($user);
  
  //fonctionne      
        // $manager = new UserManager();
        // $array = $manager->findAll();
        // var_dump($array);
        
        $this->render("index", []);
    }
}