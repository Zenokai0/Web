<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    protected static $product_details = [
        [1, 'men_shoe1', '8 9 10', 'black white gray'],
        [2, 'men_shoe2', '9 10', 'black blue'],
        [3, 'men_shoe3', '8 9 10', 'navy black'],
        [4, 'men_shoe4', '7 8 9', 'white silver'],
        [5, 'men_shoe5', '9 10', 'brown black'],
        [6, 'men_shoe6', '10 11', 'olive green black'],
        [7, 'men_shoe7', '8 9', 'red gray'],
        [8, 'men_shoe8', '11 12', 'darkblue black'],
        [9, 'men_shoe9', '9 10', 'tan black'],
        [10, 'men_shoe10', '9 10 11', 'dimgray gray'],
        [11, 'men_shoe11', '8 8.5', 'gray black'],
        [12, 'men_shirt1', 'S M L', 'blue white black'],
        [13, 'men_shirt2', 'M L XL', 'white gray'],
        [14, 'men_shirt3', 'S M', 'green navy'],
        [15, 'men_shirt4', 'M L', 'black white'],
        [16, 'men_shirt5', 'S M L', 'gray dodgerblue'],
        [17, 'men_shirt6', 'M L XL', 'red black'],
        [18, 'men_shirt7', 'S M', 'navy white'],
        [19, 'men_shirt8', 'M L', 'white gray'],
        [20, 'men_shirt9', 'S M L', 'dimgray black'],
        [21, 'men_shirt10', 'M L XL', 'maroon gray'],
        [22, 'men_shirt11', 'S M', 'lightblue white'],
        [23, 'men_shirt12', 'M L', 'olive black'],
        [24, 'wm_shoe1', '6 7 8', 'beige black white'],
        [25, 'wm_shoe2', '7 8', 'black gray'],
        [26, 'wm_shoe3', '6 7', 'pink white'],
        [27, 'wm_shoe4', '7 7.5 8', 'white black'],
        [28, 'wm_shoe5', '8 9', 'navy gray'],
        [29, 'f1', 'S M L', 'gray pink black'],
        [30, 'f2', 'S M', 'mistyrose gray'],
        [31, 'f3', 'M L XL', 'black white'],
        [32, 'f4', 'S M', 'antiquewhite gray'],
        [33, 'f5', 'M L', 'lavender black'],
        [34, 'wm_jean1', '26 28 30', 'darkslategray black'],
        [35, 'wm_jean2', '28 30', 'steelblue blue'],
        [36, 'wm_jean3', '26 27 28', 'black gray'],
        [37, 'wm_jean4', '28 29', 'lightsteelblue blue'],
        [38, 'wm_jean5', '27 28', 'gray black'],
        [39, 'wm_jean6', '29 31', 'blue black'],
        [40, 'wm_jean7', '27 28', 'white blue'],
        [41, 'wm_jean8', '28 29', 'darkslategray blue'],
        [42, 'ring1', '6 7', 'silver gold maroon'],
        [43, 'ring2', '5 6', 'gold silver'],
        [44, 'ring3', '7 8', 'rosybrown silver gold'],
        [45, 'ring4', '6 7', 'whitesmoke silver'],
        [46, 'ring5', '8 9', 'black silver'],
        [47, 'ring6', '6 6.5', 'silver gold'],
        [48, 'ring7', '7 8', 'gold silver'],
        [49, 'ring8', '6 7', 'rosybrown silver gold'],
        [51, 'neck1', '16 18', 'silver gold'],
        [52, 'neck2', '18 20', 'gold silver'],
        [53, 'neck3', '16 17', 'rosybrown silver gold'],
        [54, 'neck4', '20 22', 'silver black'],
        [55, 'neck5', '16 17 18', 'gold silver'],
        [56, 'neck6', '17 18', 'white gold silver'],
        [57, 'neck7', '18 20', 'rosybrown silver gold'],
        [58, 'neck8', '16 18', 'silver gold']
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
        $product_detail = self::$product_details[self::$index];

        // increase index, loop back to 0 if out of range
        self::$index = (self::$index + 1) % count(self::$product_details);

        return [
            'product_id' => $product_detail[0],
            'product_images' => $product_detail[1],
            'size' => $product_detail[2],
            'color' => $product_detail[3],
        ];
    }
}
