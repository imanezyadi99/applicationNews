<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $categories = [
        //     'Actualités' => ['Politique', 'Économie', 'Sport'],
        //     'Divertissement' => ['Cinéma', 'Musique', 'Sorties'],
        //     'Technologie' => [
        //         'Informatique' => ['Ordinateurs de bureau', 'PC portable', 'Connexion internet'],
        //         'Gadgets' => ['Smartphones', 'Tablettes', 'Jeux vidéo'],
        //     ],
        //     'Santé' => ['Médecine', 'Bien-être'],
        // ];

        // $randomCategory = $this->faker->randomElement(array_keys($categories));
        // $subcategories = $categories[$randomCategory];

        // // nous verifions si la categorie parent est deja dans la table pour eviter la redandance
        // if(!Category::whereName($randomCategory)->exists()){
        //     $parentCategory = Category::create([
        //         'name' => $randomCategory,
        //         'parent_id' => null, // For top parent categories
        //     ]);

        //     // pour ajouter categories fils avec categorie parent id
        //     return [
        //         'name' => $this->faker->randomElement($subcategories),
        //         'parent_id' => $parentCategory->id, // For parent subcategories
        //     ];
        // }
        // else{
        //     return [
        //         'name' => $this->faker->randomElement($subcategories),
        //         'parent_id' => "2", // For parent subcategories
        //     ];
        // }
        
        
    }
}
