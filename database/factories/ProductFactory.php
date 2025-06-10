<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected static $products = [
        ["StrideMaster Shoe", 79.99, 'men', 'shoes', 'men_shoe1'],
        ["UrbanWalker Shoe", 84.50, 'men', 'shoes', 'men_shoe2'],
        ["PaceSetter Shoe", 72.00, 'men', 'shoes', 'men_shoe3'],
        ["ElevateKicks Shoe", 91.25, 'men', 'shoes', 'men_shoe4'],
        ["PowerStep Shoe", 68.75, 'men', 'shoes', 'men_shoe5'],
        ["AdventureTrail Shoe", 89.00, 'men', 'shoes', 'men_shoe6'],
        ["FlexRun Shoe", 75.50, 'men', 'shoes', 'men_shoe7'],
        ["SummitTrek Shoe", 95.00, 'men', 'shoes', 'men_shoe8'],
        ["StreetStyle Shoe", 81.00, 'men', 'shoes', 'men_shoe9'],
        ["ActiveStride Shoe", 70.25, 'men', 'shoes', 'men_shoe10'],
        ["DynamicFit Shoe", 88.00, 'men', 'shoes', 'men_shoe11'],
        ["ClassicFit Shirt", 35.99, 'men', 'shirts', 'men_shirt1'],
        ["ComfyCrew Shirt", 28.50, 'men', 'shirts', 'men_shirt2'],
        ["AdventureSeeker Shirt", 42.00, 'men', 'shirts', 'men_shirt3'],
        ["UrbanVibe Shirt", 39.75, 'men', 'shirts', 'men_shirt4'],
        ["EasyBreeze Shirt", 31.25, 'men', 'shirts', 'men_shirt5'],
        ["SportMesh Shirt", 45.00, 'men', 'shirts', 'men_shirt6'],
        ["WeekendChill Shirt", 33.00, 'men', 'shirts', 'men_shirt7'],
        ["PerformancePro Shirt", 48.50, 'men', 'shirts', 'men_shirt8'],
        ["EverydayComfort Shirt", 29.99, 'men', 'shirts', 'men_shirt9'],
        ["GraphicBlend Shirt", 37.00, 'men', 'shirts', 'men_shirt10'],
        ["CoastalCool Shirt", 41.50, 'men', 'shirts', 'men_shirt11'],
        ["ModernEdge Shirt", 36.00, 'men', 'shirts', 'men_shirt12'],
        ["GraceWalk Shoe", 65.99, 'women', 'shoes', 'wm_shoe1'],
        ["EleganceStep Shoe", 72.50, 'women', 'shoes', 'wm_shoe2'],
        ["ComfortCloud Shoe", 60.00, 'women', 'shoes', 'wm_shoe3'],
        ["UrbanChic Shoe", 78.25, 'women', 'shoes', 'wm_shoe4'],
        ["DreamStride Shoe", 69.00, 'women', 'shoes', 'wm_shoe5'],
        ["CozyBlend Sweatshirt", 45.00, 'women', 'shirt', 'f1'],
        ["RelaxFit Sweatshirt", 49.99, 'women', 'shirt', 'f2'],
        ["UrbanComfort Sweatshirt", 52.75, 'women', 'shirt', 'f3'],
        ["SoftTouch Sweatshirt", 47.25, 'women', 'shirt', 'f4'],
        ["ChillVibe Sweatshirt", 55.00, 'women', 'shirt', 'f5'],
        ["SculptFit Jean", 58.99, 'women', 'jeans', 'wm_jean1'],
        ["EverydayEase Jean", 52.50, 'women', 'jeans', 'wm_jean2'],
        ["StretchSculpt Jean", 61.00, 'women', 'jeans', 'wm_jean3'],
        ["WeekendWorn Jean", 55.75, 'women', 'jeans', 'wm_jean4'],
        ["ContourFlex Jean", 63.25, 'women', 'jeans', 'wm_jean5'],
        ["VintageCharm Jean", 59.50, 'women', 'jeans', 'wm_jean6'],
        ["ModernMuse Jean", 60.00, 'women', 'jeans', 'wm_jean7'],
        ["ComfyCurve Jean", 54.00, 'women', 'jeans', 'wm_jean8'],
        ["FlatteringFit Jean", 57.00, 'women', 'jeans', 'wm_jean9'],
        ["EternalSpark Ring", 120.00, 'accessories', 'rings', 'ring1'],
        ["DaintyGlow Ring", 85.50, 'accessories', 'rings', 'ring2'],
        ["ModernBand Ring", 99.00, 'accessories', 'rings', 'ring3'],
        ["SimplyElegant Ring", 75.25, 'accessories', 'rings', 'ring4'],
        ["UrbanEdge Ring", 110.00, 'accessories', 'rings', 'ring5'],
        ["DelicateBloom Ring", 92.00, 'accessories', 'rings', 'ring6'],
        ["TimelessTreasure Ring", 135.00, 'accessories', 'rings', 'ring7'],
        ["MinimalChic Ring", 88.00, 'accessories', 'rings', 'ring8'],
        ["GracefulDrop Necklace", 150.00, 'accessories', 'necklaces', 'neck1'],
        ["LuxeLink Necklace", 180.00, 'accessories', 'necklaces', 'neck2'],
        ["SubtleShine Necklace", 130.00, 'accessories', 'necklaces', 'neck3'],
        ["BoldStatement Necklace", 200.00, 'accessories', 'necklaces', 'neck4'],
        ["EverydayGlam Necklace", 145.00, 'accessories', 'necklaces', 'neck5'],
        ["CelestialCharm Necklace", 165.00, 'accessories', 'necklaces', 'neck6'],
        ["OrganicFlow Necklace", 175.00, 'accessories', 'necklaces', 'neck7'],
        ["ClassicChain Necklace", 125.00, 'accessories', 'necklaces', 'neck8']
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static $index = 0;

    public function definition()
    {
        // get the current product info
        $product = self::$products[self::$index];

        // increase index, loop back to 0 if out of range
        self::$index = (self::$index + 1) % count(self::$products);

        return [
            'product_name' => $product[0],
            'price' => $product[1],
            'category' => $product[2],
            'subcategory' => $product[3],
            'product_image' => $product[4],
        ];
    }
}
