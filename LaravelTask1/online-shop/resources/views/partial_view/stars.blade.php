@php
    
    $fullStars = floor($product['rating']);
    $halfStars = $product['rating'] - $fullStars;
    $emptyStars = 4 - $fullStars;
    for ($i = 0; $i < $fullStars; $i++) {
        echo '<small class="fa fa-star text-primary mr-1"></small>';
    }
    
    if ($halfStars == 0.5) {
        echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
    }
    if ($emptyStars) {
        for ($z = 0; $z < $emptyStars; $z++) {
            echo '<small class="far fa-star text-primary mr-1"></small>';
        }
    }
@endphp
<small>(<?= $product['rating_count'] ?>)</small>
