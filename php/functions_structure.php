<?php

    function displayPokedex($pokedex) {
        echo '<div class="pokedex-container">' ;

        foreach ($pokedex as $pokemon) {
            echo '<div class="pokemon-card opacity-card">' ;
            echo '<a href="pokemon.php?numero='.$pokemon['numero'].'">' ;
            echo '<img src="'.$pokemon['chemin'].'" alt="'.$pokemon['nom'].'" class="pokemon-image">' ;
            echo '</a>' ;
            echo '<div class="pokemon-name">'.$pokemon['nom'].'</div>' ;
            echo '<div class="pokemon-numero">#'.$pokemon['numero'].'</div>' ;
            echo '</div>';
        }

        echo '</div>';
    }

    function displayPokemon($pokedex,$numero){
        $info = get_info($pokedex,$numero);
        $types = get_type($pokedex,$numero);
        $images = get_image($pokedex,$numero);
        $attaques = get_attaque($pokedex,$numero);
        $evolutions = get_evolution($pokedex,$numero);

        echo '<div class="pokedex-container">' ;
        $typeString = $types[0]['libelle'] ;
        if (str_contains($typeString, 'Eau')) {
            echo '<div class="pokemon-card-water opacity-card">';
        } 
        elseif (str_contains($typeString, 'Plante')) {
            echo '<div class="pokemon-card-plante opacity-card">';
        }
        elseif (str_contains($typeString, 'Feu')) {
            echo '<div class="pokemon-card-feu opacity-card">';
        }
        elseif (str_contains($typeString, 'Electrique')) {
            echo '<div class="pokemon-card-electrique opacity-card">';
        }
        elseif (str_contains($typeString, 'Vol')) {
            echo '<div class="pokemon-card-vol opacity-card">';
        }
        elseif (str_contains($typeString, 'Sol')) {
            echo '<div class="pokemon-card-sol opacity-card">';
        }
        elseif (str_contains($typeString, 'Poison')) {
            echo '<div class="pokemon-card-poison opacity-card">';
        }
        elseif (str_contains($typeString, 'Insecte')) {
            echo '<div class="pokemon-card-insecte opacity-card">';
        }
        elseif (str_contains($typeString, 'Combat')) {
            echo '<div class="pokemon-card-combat opacity-card">';
        }
        elseif (str_contains($typeString, 'Psy')) {
            echo '<div class="pokemon-card-psy opacity-card">';
        }
        elseif (str_contains($typeString, 'Roche')) {
            echo '<div class="pokemon-card-sol opacity-card">';
        }
        elseif (str_contains($typeString, 'Dragon')) {
            echo '<div class="pokemon-card-dragon opacity-card">';
        }
        elseif (str_contains($typeString, 'Glace')) {
            echo '<div class="pokemon-card-glace opacity-card">';
        }
        else {
            echo '<div class="pokemon-card-normal opacity-card">';
        }

        echo '<div class="pokemon-name">'.$info['nom'].'</div>' ;
        echo '<div class="pokemon-numero">#'.$info['numero'].'</div>' ;
        echo '<div class="pokemon-description">'.$info['description'].'</div>' ;

        echo '<div class="pokemon-type">';
        foreach ($types as $type) {
            echo '<img src="'.$type['chemin'].'" alt="Image de '.$type['libelle'].'" class="pokemon-image">' ;
        }
        echo '</div>';

        foreach ($images as $image) {
            echo '<img src="'.$image['chemin'].'" alt="Image de '.$info['nom'].'" class="pokemon-image">' ;
        }

        echo '<div class="pokemon-attaque">';
        foreach ($attaques as $attaque) {
            echo '<div class="pokemon-attaque-card">';
            echo '<img src="'.$attaque['chemin'].'"class="pokemon-image">' ;
            echo '<div>Attaque : '.$attaque['libelle_capacite'].'</div>';
            echo '<div>PP : '.$attaque['pp_capacite'].'</div>';
            echo '<div>Puissance : '.$attaque['puissance_capacite'].'</div>';
            echo '<div>Précision : '.$attaque['precision_capacite'].'</div>';
            echo '</div>';
        }
        echo '</div>';

        if (!empty($evolutions)) {
            echo '<div class="pokemon-evolue">Évolutions : ';
            foreach ($evolutions as $evo) {
                echo '<a>'.$evo['nom'].' </a>';
            }
            echo '</div>';
        } else {
            echo '<div style="margin-top : 1.5vw"><em>Pas d\'évolution connue</em></div>';
        }
        
        echo '</div>';
    }

    function displayPokedexDresseur($pokedex) {
        echo '<div class="pokedex-container opacity-card">' ;

        foreach ($pokedex as $pokemon) {
            echo '<div class="pokemon-card">' ;
            if ($pokemon['nbVue'] != 0){
                echo '<a href="pokemon.php?numero='.$pokemon['numero'].'">' ;
                echo '<img src="'.$pokemon['chemin'].'" alt="'.$pokemon['nom'].'" class="pokemon-image">' ;
                if($pokemon['nbAttrape'] != 0){
                    echo '<img src="images/pokeball.webp" alt="Attrapé" class="pokeball">';
                }
                echo '</a>' ;
                echo '<div class="pokemon-name">'.$pokemon['nom'].'</div>' ;
                echo '<div class="pokemon-numero">#'.$pokemon['numero'].'</div>' ;
            }
            else{
                echo '<a href="pokemon.php?numero='.$pokemon['numero'].'">' ;
                echo '<img src="'.$pokemon['chemin'].'" alt="'.$pokemon['nom'].'" class="pokemon-image opacity-low">' ;
                echo '</a>' ;
                echo '<div class="pokemon-name"> ??? </div>' ;
                echo '<div class="pokemon-numero">#'.$pokemon['numero'].'</div>' ;
            }
            echo '</div>';
        }
        echo '</div>';
    }

    function displayPokemonDresseur($pokedex, $numero, $id_dresseur){
        $info = get_info($pokedex,$numero);
        $types = get_type($pokedex,$numero);
        $images = get_image($pokedex,$numero);
        $attaques = get_attaque($pokedex,$numero);
        $evolutions = get_evolution($pokedex,$numero);
        $dresseur = infoDresseur($pokedex, $id_dresseur, $numero);

        echo '<div class="pokedex-container">' ;
        $typeString = $types[0]['libelle'] ;
        if (str_contains($typeString, 'Eau')) {
            echo '<div class="pokemon-card-water opacity-card">';
        } 
        elseif (str_contains($typeString, 'Plante')) {
            echo '<div class="pokemon-card-plante opacity-card">';
        }
        elseif (str_contains($typeString, 'Feu')) {
            echo '<div class="pokemon-card-feu opacity-card">';
        }
        elseif (str_contains($typeString, 'Electrique')) {
            echo '<div class="pokemon-card-electrique opacity-card">';
        }
        elseif (str_contains($typeString, 'Vol')) {
            echo '<div class="pokemon-card-vol opacity-card">';
        }
        elseif (str_contains($typeString, 'Sol')) {
            echo '<div class="pokemon-card-sol opacity-card">';
        }
        elseif (str_contains($typeString, 'Poison')) {
            echo '<div class="pokemon-card-poison opacity-card">';
        }
        elseif (str_contains($typeString, 'Insecte')) {
            echo '<div class="pokemon-card-insecte opacity-card">';
        }
        elseif (str_contains($typeString, 'Combat')) {
            echo '<div class="pokemon-card-combat opacity-card">';
        }
        elseif (str_contains($typeString, 'Psy')) {
            echo '<div class="pokemon-card-psy opacity-card">';
        }
        elseif (str_contains($typeString, 'Roche')) {
            echo '<div class="pokemon-card-sol opacity-card">';
        }
        elseif (str_contains($typeString, 'Dragon')) {
            echo '<div class="pokemon-card-dragon opacity-card">';
        }
        elseif (str_contains($typeString, 'Glace')) {
            echo '<div class="pokemon-card-glace opacity-card">';
        }
        else {
            echo '<div class="pokemon-card-normal opacity-card">';
        }

        if (($dresseur[0]['nbVue'] ?? 0) != 0){ // ??0 : si nbVue est null, il est remplacé par 0
            echo '<div class="pokemon-name">'.$info['nom'].'</div>' ;
            echo '<div class="pokemon-numero">#'.$info['numero'].'</div>' ;
            echo '<div class="pokemon-description">'.$info['description'].'</div>' ;
            
            echo '<div>';
            foreach ($types as $type) {
                echo '<img src="'.$type['chemin'].'" alt="Image de '.$type['libelle'].'" class="pokemon-image">' ;
            }
            echo '</div>';
    
            foreach ($images as $image) {
                echo '<img src="'.$image['chemin'].'" alt="Image de '.$info['nom'].'" class="pokemon-image">' ;
            }
            
            if (($dresseur[0]['nbAttrape'] ?? 0) != 0){
                echo '<div class="pokemon-attaque">';
            }
            else {
                echo '<div class="pokemon-attaque opacity-low">';
            }
            
            foreach ($attaques as $attaque) {
                echo '<div class="pokemon-attaque-card">';
                echo '<img src="'.$attaque['chemin'].'"class="pokemon-image">' ;
                echo '<div>Attaque : '.$attaque['libelle_capacite'].'</div>';
                echo '<div>PP : '.$attaque['pp_capacite'].'</div>';
                echo '<div>Puissance : '.$attaque['puissance_capacite'].'</div>';
                echo '<div>Précision : '.$attaque['precision_capacite'].'</div>';
                echo '</div>';
            }
            echo '</div>';

            if (!empty($evolutions)) {
                echo '<div class="pokemon-evolue">Évolutions : ';
                foreach ($evolutions as $evo) {
                    echo '<a>'.$evo['nom'].' </a>';
                }
                echo '</div>';
            } else {
                echo '<div style="margin-top : 1.5vw"><em>Pas d\'évolution connue</em></div>';
            }    
        }
        else{
            echo '<div class="pokemon-name"> ??? </div>' ;
            echo '<div class="pokemon-numero">#'.$info['numero'].'</div>' ;
            echo '<div class="pokemon-description">Description pas encore disponible. Pour la débloquer il faut que vous ayez rencontré au moins une fois ce pokémon. </div>' ;

            echo '<div class="pokemon-type">';
            foreach ($types as $type) {
                echo '<img src="'.$type['chemin'].'" alt="Image de '.$type['libelle'].'" class="pokemon-image opacity-low">' ;
            }
            echo '</div>';

            foreach ($images as $image) {
                echo '<img src="'.$image['chemin'].'" alt="Image de '.$info['nom'].'" class="pokemon-image opacity-low">' ;
            }

            echo '<div class="pokemon-attaque opacity-low">';
            foreach ($attaques as $attaque) {
                echo '<div class="pokemon-attaque-card">';
                echo '<img src="'.$attaque['chemin'].'"class="pokemon-image">' ;
                echo '<div>Attaque : '.$attaque['libelle_capacite'].'</div>';
                echo '<div>PP : '.$attaque['pp_capacite'].'</div>';
                echo '<div>Puissance : '.$attaque['puissance_capacite'].'</div>';
                echo '<div>Précision : '.$attaque['precision_capacite'].'</div>';
                echo '</div>';
            }
            echo '</div>';

            echo '<div style="margin-top : 1.5vw"> Vous n\'avez pas encore accés à ces données </div>';
        }
        echo '<div>Nombre de fois où le pokémon a été vu : '.($dresseur[0]['nbVue'] ?? 0).'</div>';
        echo '<div>Nombre de fois où le pokémon a été attrapé : '.($dresseur[0]['nbAttrape'] ?? 0).'</div>';
        echo '</div>';
    }

?>