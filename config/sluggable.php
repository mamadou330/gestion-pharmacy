<?php

return [

    /**
     * What attributes do we use to build the slug?
     * This can be a single field, like "name" which will build a slug from:
     *
     *     $model->name;
     *
     * Or it can be an array of fields, like ["name", "company"], which builds a slug from:
     *
     *     $model->name . ' ' . $model->company;
     *
     * If you've defined custom getters in your model, you can use those too,
     * since Eloquent will call them when you request a custom attribute.
     *
     * Defaults to null, which uses the toString() method on your model.
     * 
     * 
     * Quels attributs utilisons-nous pour construire le slug ?
     * 
     *Cela peut être un seul champ, comme "nom" qui construira un slug à partir de :
    
      * $modèle->nom ;
     
      * Ou il peut s'agir d'un tableau de champs, comme ["nom", "société"], qui crée un slug à partir de :
      * $modèle->nom . ' ' . $modèle->entreprise ;
     
      *Si vous avez défini des getters personnalisés dans votre modèle, vous pouvez également les utiliser,
      *car Eloquent les appellera lorsque vous demanderez un attribut personnalisé.
     
      *La valeur par défaut est null, qui utilise la méthode toString() sur votre modèle.
     */

    'source' => 'name',

    /**
     * The maximum length of a generated slug.  Defaults to "null", which means
     * no length restrictions are enforced.  Set it to a positive integer if you
     * want to make sure your slugs aren't too long.
     * 
     * 
     * La longueur maximale d'un slug généré. La valeur par défaut est "null", ce qui signifie
     * aucune restriction de longueur n'est appliquée. Définissez-le sur un entier positif si vous
     * vous voulez vous assurer que vos limaces ne sont pas trop longues.
     */

    'maxLength' => null,

    /**
     * If you are setting a maximum length on your slugs, you may not want the
     * truncated string to split a word in half.  The default setting of "true"
     * will ensure this, e.g. with a maxLength of 12:
     *
     *   "my source string" -> "my-source"
     *
     * Setting it to "false" will simply truncate the generated slug at the
     * desired length, e.g.:
     *
     *   "my source string" -> "my-source-st"
     * 
     * 
     * 
     * Si vous définissez une longueur maximale sur vos slugs,
     *  vous ne voudrez peut-être pas que la
     * chaîne tronquée pour diviser un mot en deux. Le paramètre par défaut de "true"
     * assurera cela, par ex. avec une longueur max de 12 :
     *
     * "ma chaîne source" -> "ma-source"
     *
     * Le définir sur "false" tronquera simplement le slug généré au
     * longueur souhaitée, par exemple :
     *
     * "ma chaîne source" -> "ma-source-st"
     */

    'maxLengthKeepWords' => true,

    /**
     * If left to "null", then use the cocur/slugify package to generate the slug
     * (with the separator defined below).
     *
     * Set this to a closure that accepts two parameters (string and separator)
     * to define a custom slugger.  e.g.:
     *
     *    'method' => function( $string, $sep ) {
     *       return preg_replace('/[^a-z]+/i', $sep, $string);
     *    },
     *
     * Otherwise, this will be treated as a callable to be used.  e.g.:
     *
     *    'method' => array('Str','slug'),
     * 
     *
     *Si laissé à "null", utilisez le package cocur/slugify pour générer le slug
     * (avec le séparateur défini ci-dessous).
     *
     * Définissez ceci sur une fermeture qui accepte deux paramètres (chaîne et séparateur)
     * pour définir un slugge personnalisé. par exemple.:
     *
     * 'méthode' => fonction( $string, $sep ) {
     * return preg_replace('/[^a-z]+/i', $sep, $string);
     * },
     *
     * Sinon, cela sera traité comme un appelable à utiliser. par exemple.:
     *
     * 'method' => array('Str','slug'),
     */

    'method' => null,

    /**
     * Separator to use when generating slugs.  Defaults to a hyphen.
     * 
     * * Séparateur à utiliser lors de la génération de limaces. La valeur par défaut est un trait d'union.
     */

    'separator' => '-',

    /**
     * Enforce uniqueness of slugs?  Defaults to true.
     * If a generated slug already exists, an incremental numeric
     * value will be appended to the end until a unique slug is found.  e.g.:
     *
     *     my-slug
     *     my-slug-1
     *     my-slug-2
     * 
     *  Appliquer l'unicité des limaces ? La valeur par défaut est true.
     * Si un slug généré existe déjà, une valeur numérique incrémentielle
     * la valeur sera ajoutée à la fin jusqu'à ce qu'un slug unique soit trouvé. par exemple.:
     *
     * ma limace
     * ma-slug-1
     * ma-slug-2
     */

    'unique' => true,

    /**
     * If you are enforcing unique slugs, the default is to add an
     * incremental value to the end of the base slug.  Alternatively, you
     * can change this value to a closure that accepts three parameters:
     * the base slug, the separator, and a Collection of the other
     * "similar" slugs.  The closure should return the new unique
     * suffix to append to the slug.
     * 
     * 
     * * Si vous appliquez des slugs uniques, la valeur par défaut est d'ajouter une
     * valeur incrémentale jusqu'à la fin du slug de base. Alternativement, vous
     * peut changer cette valeur en une fermeture qui accepte trois paramètres :
     * le slug de base, le séparateur, et une Collection de l'autre
     * limaces "similaires". La fermeture devrait renvoyer le nouveau
     * suffixe à ajouter au slug.
     */
    
    'uniqueSuffix' => null,

    /**
     * What is the first suffix to add to a slug to make it unique?
     * For the default method of adding incremental integers, we start
     * counting at 2, so the list of slugs would be, e.g.:
     *
     *   - my-post
     *   - my-post-2
     *   - my-post-3
     * 
     * * Quel est le premier suffixe à ajouter à un slug pour le rendre unique ?
     * Pour la méthode par défaut d'ajout d'entiers incrémentaux, nous commençons
     * comptant à 2, donc la liste des slugs serait, par exemple :
     *
     * - mon message
     * - mon-post-2
     * - mon-post-3
     */
    'firstUniqueSuffix' => 2,

    /**
     * Should we include the trashed items when generating a unique slug?
     * This only applies if the softDelete property is set for the Eloquent model.
     * If set to "false", then a new slug could duplicate one that exists on a trashed model.
     * If set to "true", then uniqueness is enforced across trashed and existing models.
     * 
     * 
     * * Devrions-nous inclure les éléments supprimés lors de la génération d'un slug unique ?
     * Cela s'applique uniquement si la propriété softDelete est définie pour le modèle Eloquent.
     * Si défini sur "false", alors un nouveau slug pourrait dupliquer celui qui existe sur un modèle supprimé.
     * Si défini sur "true", alors l'unicité est appliquée à travers les modèles mis à la corbeille et existants.
     */

    'includeTrashed' => true,

    /**
     * An array of slug names that can never be used for this model,
     * e.g. to prevent collisions with existing routes or controller methods, etc..
     * Defaults to null (i.e. no reserved names).
     * Can be a static array, e.g.:
     *
     *    'reserved' => array('add', 'delete'),
     *
     * or a closure that returns an array of reserved names.
     * If using a closure, it will accept one parameter: the model itself, and should
     * return an array of reserved names, or null. e.g.
     *
     *    'reserved' => function( Model $model) {
     *      return $model->some_method_that_returns_an_array();
     *    }
     *
     * In the case of a slug that gets generated with one of these reserved names,
     * we will do:
     *
     *    $slug .= $separator + "1"
     *
     * and continue from there.
     * 
     * 
     *  Un tableau de noms de slugs qui ne pourront jamais être utilisés pour ce modèle,
     * par exemple. pour éviter les collisions avec des routes ou des méthodes de contrôleur existantes, etc.
     * La valeur par défaut est nulle (c'est-à-dire pas de noms réservés).
     * Peut être un tableau statique, par exemple :
     *
     * 'reserved' => array('add', 'delete'),
     *
     * ou une fermeture qui renvoie un tableau de noms réservés.
     * Si vous utilisez une fermeture, il acceptera un paramètre : le modèle lui-même, et devrait
     * renvoie un tableau de noms réservés, ou null. par exemple.
     *
     * 'réservé' => fonction( Modèle $modèle) {
     * return $model->some_method_that_returns_an_array();
     * }
     *
     * Dans le cas d'un slug généré avec l'un de ces noms réservés,
     * nous ferons:
     *
     * $slug .= $separator + "1"
     *
     * et continuer à partir de là.
     */

    'reserved' => null,

    /**
     * Whether to update the slug value when a model is being
     * re-saved (i.e. already exists).  Defaults to false, which
     * means slugs are not updated.
     *
     * Be careful! If you are using slugs to generate URLs, then
     * updating your slug automatically might change your URLs which
     * is probably not a good idea from an SEO point of view.
     * Only set this to true if you understand the possible consequences.
     * 
     * 
     * 
     * * S'il faut mettre à jour la valeur du slug lorsqu'un modèle est en cours
     * réenregistré (c'est-à-dire qu'il existe déjà). La valeur par défaut est false, ce qui
     * signifie que les slugs ne sont pas mis à jour.
     *
     * Fais attention! Si vous utilisez des slugs pour générer des URL, alors
     * la mise à jour automatique de votre slug peut modifier vos URL, ce qui
     * n'est probablement pas une bonne idée d'un point de vue SEO.
     * Ne définissez cette valeur sur true que si vous comprenez les conséquences possibles.
     */
    
    'onUpdate' => false,

    /**
     * If the default slug engine of cocur/slugify is used, this array of
     * configuration options will be used when instantiating the engine.
     * 
     *  Si le moteur de slug par défaut de cocur/slugify est utilisé, ce tableau de
     * les options de configuration seront utilisées lors de l'instanciation du moteur.
     */
    'slugEngineOptions' => [],

];
