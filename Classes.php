<?php
    
    /* ---classes--- */
   
    class User{
        
        //variables
        private $fname;
        private $lname;
        private $dob;
        private $email;
        private $password;

        //constructor
        public function __construct($fname, $lname, $dob, $email, $password){
            $this->fname = $fname;
            $this->lname = $lname;
            $this->dob = $dob;
            $this->email = $email;
            $this->password = $password;
        }

        //setters
        public function setFName($fname){
            $this->fname = $fname;
        }

        public function setLName($lname){
            $this->lname = $lname;
        }

        public function setdob($dob){
            $this->dob = $dob;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setPassword($password){
            if (strlen($password) >= 8) {
                $this->password = $password;
            } else {
                //error msg
            }  
        }

        //getters
        public function getFName(){
            return $this->fname;
        }

        public function getLName(){
            return $this->lname;
        }

        public function getdob(){
            return $this->dob;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }
        
    }

    class Control{
        private $users = array();
        private $recipes = array();

        public function __construct(){
            
        }

        //users

        public function addUser($fname, $lname, $dob, $email, $password){
            
            $user = new User($fname, $lname, $dob, $email, $password);
            
            // $user->fname = $fname;
            // $user->lname = $lname;
            // $user->dob = $dob;
            // $user->email = $email;
            // $user->email = $password;
            
            $this->users[] = $user;
        }

        public function removeUser($email, $password){
            foreach($users as $user) {
                if($user->email == $email && $user->password == $password){
                    //todo - remove
                }
            }
        }

        public function getAllUsers(){
            return $this->users;
        }

        public function getUser($email){
            foreach($users as $user) {
                if($user->email == $email){
                    return "$user";
                }
            }
        }

            //recipes

        public function addRecipe($title, $calories, $cuisine, $duration, $difficulty, $instructions){
            $recipe = new Recipe($title, $calories, $cuisine, $duration, $difficulty, $instructions);
            
            // $recipe->title = $title;
            // $recipe->calories = $calories;
            // $recipe->cuisine = $cuisine;
            // $recipe->duration = $duration;
            // $recipe->difficulty = $difficulty;
            // $recipe->id = $instructions;

            $this->recipes[] = $recipe;
        }

        public function removeRecipe($id){
            foreach($recipes as $recipe) {
                if($recipe->id == $id){
                    //todo - remove
                }
            }
        }

        public function getAllRecipes(){
            return $this->recipes;
        }

        public function getRecipe($id){
            foreach($recipes as $recipe) {
                if($recipe->id == $id){
                    return $recipe;
                }
            }
        }

    }


    class Recipe{
        
        //variables
        private $ingredients = array();

        public static $idCounter = 1000;
        private $id;
        private $title;
        private $calories;
        private $cuisine;
        private $duration;
        private $difficulty;
        private $instructions;

        //constructor
        public function __construct($title, $calories, $cuisine, $duration, $difficulty, $instructions){
            $this->title = $title;
            $this->calories = $calories;
            $this->cuisine = $cuisine;
            $this->duration = $duration;
            $this->difficulty = $difficulty;
            $this->instructions = $instructions;

            $this->id = self::$idCounter;

            self::$idCounter++;
        }

        //setters
        public function setTitle($title){
            $this->title = $title;
        }

        public function setCalories($calories){
            $this->calories = $calories;
        }

        public function setCuisine($cuisine){
            $this->cuisine = $cuisine;
        }

        public function setDuration($duration){
            $this->duration = $duration;
        }

        public function setDifficulty($difficulty){
            $this->difficulty = $difficulty;
        }

        public function setInstructions($instructions){
            $this->instructions = $instructions;
        }

        //getters
        public function getID(){
            return $this->id;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getCalories(){
            return $this->calories;
        }

        public function getCuisine(){
            return $this->cuisine;
        }

        public function getDuration(){
            return $this->duration;
        }

        public function getDifficulty(){
            return $this->difficulty;
        }
        public function getInstructions(){
            return $this->instructions;
        }

        //array methods
        public function addIngredient($name, $quantity){
            $ingredient = new Ingredient();

            $ingredient->name = $name;
            $ingredient->quantity = $quantity;

            $ingredients[] = $ingredient;
        }

        public function removeIngredient($id){
            //unset( $ingredients[array_search( 'te', $ingredients )] );

            foreach($ingredients as $ingredient) {
                if($ingredient->id == $id){
                    // to-do delete
                }
            }
        }

        public function getAllIngredients(){
            array_values($ingredients);
        }
    }

    class Ingredient{
        
        //variables
       public static $idCounter = 1000;
       private $id;
       private $name;
       private $quantity;

        //constructor
        public function __construct($name, $quantity){
            $this->name = $name;
            $this->quantity = $quantity;
            $this->id = $idCounter;

            $idCounter++;
        }

        //setters
        public function setName($name){
            $this->name = $name;
        }
        
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
        
        //getters
        public function getName(){
            return $this->name;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function getID(){
            return $this->id;
        }
    }

    /* ---enums--- */
    class DifficultyLevel
    {
        const EASY = 0;
        const MEDIUM = 1;
        const HARD = 2;
        const EXPERT = 3;
    }

    class CuisineType
    {
        const ITALIAN = 0;
        const CHINESE = 1;
        const JAPANESE = 2;
        const MEXICAN = 3;
        const THAI = 4;
        const AMERICAN = 5;
        const INDIAN = 6;
        const BALKAN = 7;
        const ARAB = 8;
    }

?>