<?php

    function getPokedex($mysqli){
        $query = "SELECT pokemon.id_pokemon, numero, nom, chemin 
                  FROM pokemon 
                  INNER JOIN image ON pokemon.id_pokemon = image.id_pokemon 
                  WHERE chemin LIKE '%pokemon_miniature%' ";
        $res = readDB($mysqli,$query);
        return $res;
    }

    function get_info($mysqli,$numero){
        $query = "SELECT nom, numero, description 
                  FROM pokemon 
                  WHERE numero = $numero ";
        $res = readDB($mysqli,$query);
        return $res[0]; /* Car res est sinon un tableau de tableau */
    }

    function get_type($mysqli,$numero){
        $query = "SELECT libelle, chemin 
                  FROM esttype 
                  INNER JOIN type ON esttype.id_type = type.id_type 
                  WHERE id_pokemon = $numero ";
        $res = readDB($mysqli,$query);
        return $res;
    }

    function get_image($mysqli,$numero){
        $query = "SELECT chemin 
                  FROM image 
                  WHERE id_pokemon = $numero ";
        $res = readDB($mysqli,$query);
        return $res;
    }

    function get_attaque($mysqli,$numero){
        $query = "SELECT libelle_capacite, pp_capacite, puissance_capacite, precision_capacite, chemin
                  FROM lance 
                  INNER JOIN capacite ON lance.id_capacite = capacite.id_capacite 
                  INNER JOIN type ON capacite.id_type = type.id_type
                  WHERE id_pokemon = $numero ";
        $res = readDB($mysqli,$query);
        return $res;
    }

    function get_evolution($mysqli, $numero) {
        $query = "SELECT pokemon.nom 
                  FROM pokemon 
                  INNER JOIN evolue ON pokemon.id_pokemon = evolue.id_pokemon_evolue 
                  WHERE evolue.id_pokemon_base = $numero ";
        $res = readDB($mysqli, $query);
        return $res;
    } // ne retourne que la première évolution voir comment ameliorer ça plus tard
    
    function is_dresseur($mysqli, $nom_dresseur, $mdp_dresseur) {
        $query = "SELECT nom_dresseur, mdp_dresseur, id_dresseur
                  FROM dresseur 
                  WHERE nom_dresseur = '$nom_dresseur' AND mdp_dresseur = '$mdp_dresseur' ";
        $res = readDB($mysqli, $query);
        return $res;
    }

    function infoDresseur($mysqli, $id_dresseur, $id_pokemon){
        $query = "SELECT nbVue, nbAttrape
                  FROM pokedex
                  WHERE id_dresseur = $id_dresseur AND id_pokemon = $id_pokemon ";
        $res = readDB($mysqli, $query);
        return $res;
    }

    function getPokedexDresseur($mysqli, $id_dresseur){
        $query = "SELECT pokemon.id_pokemon, pokemon.numero, pokemon.nom, image.chemin, nbAttrape, nbVue
                  FROM pokemon
                  INNER JOIN image ON pokemon.id_pokemon = image.id_pokemon
                  LEFT JOIN pokedex ON pokemon.id_pokemon = pokedex.id_pokemon AND pokedex.id_dresseur = $id_dresseur
                  WHERE image.chemin LIKE '%pokemon_miniature%' ";
        $res = readDB($mysqli, $query);
        return $res;
    }

    function getPokemons($mysqli) {
        $query = "SELECT id_pokemon, nom 
                  FROM pokemon 
                  ORDER BY numero ASC";
        $res = readDB($mysqli, $query);
        return $res;
    }

    function insert($mysqli, $nbVue, $nbAttrape, $id_dresseur, $id_pokemon) {
        $query = "INSERT INTO pokedex (id_dresseur, id_pokemon, nbVue, nbAttrape) VALUES ($id_dresseur, $id_pokemon, $nbVue, $nbAttrape)";
        $res = writeDB($mysqli, $query);
        return $res;
    }

    function update($mysqli, $nbVue, $nbAttrape, $id_dresseur, $id_pokemon) {
        $query = "UPDATE pokedex SET nbVue = $nbVue, nbAttrape = $nbAttrape
                  WHERE $id_pokemon = id_pokemon AND $id_dresseur = id_dresseur";
        $res = writeDB($mysqli, $query);
        return $res;
    }
?>
