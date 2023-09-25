<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Products;
use App\Models\ProductVariants;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $shoeNames = [
            'Adidas Superstar',
            'Nike Air Max',
            'Converse Chuck Taylor',
            'Puma Suede Classic',
            'Reebok Classic Leather',
            'Vans Old Skool',
            'New Balance 990',
            'Jordan Retro 1',
            'Adidas Stan Smith',
            'Nike Air Force 1',
            'Converse One Star',
            'Puma Clyde',
            'Reebok Workout Plus',
            'Vans Sk8-Hi',
            'New Balance 574',
            'Asics Gel-Lyte III',
            'Fila Disruptor',
            'Saucony Jazz Original',
            'Under Armour Curry 5',
            'Brooks Ghost 12',
        ];
        $shoeSizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
        $description = "Lorem ipsum dolor sit amet, in eleifend inimicus elaboraret his, harum efficiendi mel ne. Sale percipit vituperata ex mel, sea ne essent aeterno sanctus, nam ea laoreet civibus electram. Ea vis eius explicari. Quot iuvaret ad has.

        Vis ei ipsum conclusionemque. Te enim suscipit recusabo mea, ne vis mazim aliquando, everti insolens at sit. Cu vel modo unum quaestio, in vide dicta has. Ut his laudem explicari adversarium, nisl laboramus hendrerit te his, alia lobortis vis ea.
        
        Perfecto eleifend sea no, cu audire voluptatibus eam. An alii praesent sit, nobis numquam principes ea eos, cu autem constituto suscipiantur eam. Ex graeci elaboraret pro. Mei te omnis tantas, nobis viderer vivendo ex has.";
        $faker = Faker::create();

        // Create 10 products with random data
        foreach ($shoeNames as $shoes) {
            $product = Products::create([
                'categories_id' => DB::table('categories')->inRandomOrder()->value('id'),
                'name' => $shoes,
                'description' => $description,
            ]);

            // Create random variants for each product
            $previousPrice = null; 

            foreach ($shoeSizes as $size) {
                // Generate a new price larger than the previous one
                $price = $previousPrice !== null ? $previousPrice + rand(10, 20) : rand(100, 200);

                // Create the product variant
                ProductVariants::create([
                    'product_id' => $product->id,
                    'name' => $size,
                    'price' => $price,
                    'stock' => $faker->numberBetween(80, 400),
                ]);

                // Update the previous price
                $previousPrice = $price;
            }
        }
    }
}
