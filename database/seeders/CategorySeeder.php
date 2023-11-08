<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function hasMultipleSubarrays($array) {
        $subarrayCount = 0;
    
        foreach ($array as $element) {
            if (is_array($element) && !empty($element)) {
                $subarrayCount++;
    
                // If more than one subarray is found, return true
                if ($subarrayCount > 1) {
                    return true;
                }
            }
        }
    
        // If only one or zero non-empty subarrays are found, return false
        return false;
    }

    public function run(): void
    {
        $categories = [
            'Actualités' => [
                'Politique', 
                'Économie', 
                'Sport'
            ],
            'Divertissement' => [
                'Cinéma', 
                'Musique', 
                'Sorties'
            ],
            'Technologie' => [
                'Informatique' => [
                    'Ordinateurs de bureau', 
                    'PC portable', 
                    'Connexion internet'
                ],
                'Gadgets' => [
                    'Smartphones', 
                    'Tablettes', 
                    'Jeux vidéo'
                ],
            ],
            'Santé' => [
                'Médecine', 
                'Bien-être'
            ],
        ];

        foreach ($categories as $key => $valCat) {
            
            if(!Category::whereName($key)->exists()){
                Category::create([
                    'name'=>$key,
                    'category_id'=>null,
                ]);
            }

            if($this->hasMultipleSubarrays($categories[$key])){
                
                foreach ($categories[$key] as $keySubCat=> $valSubCat) {

                    if(!Category::whereName($keySubCat)->exists()){
                        Category::create([
                            'name'=>$keySubCat,
                            'category_id'=>Category::whereName($key)->first('id')->id,
                        ]);
                    }

                    foreach ($valSubCat as $subCat2) {
                        Category::create([
                            'name'=>$subCat2,
                            'category_id'=>Category::whereName($keySubCat)->first('id')->id,
                        ]);
                    }
                }
            }
            else{
                foreach ($categories[$key] as $subCat) {
                    Category::create([
                        'name'=>$subCat,
                        'category_id'=>Category::whereName($key)->first('id')->id,
                    ]);
                }
            }
        }
    }
}
