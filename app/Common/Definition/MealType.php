<?php

namespace App\Common\Definition;

enum MealType: string
{
    use EnumEx;

    case Breakfast = '1';
    case Meal = '2';
    case EatClean = '3';
    case Snacks = '4'; // an vat
    case Party = '5'; // an nhau
    case EatWeaning = '6'; // an dam

    /**
     * {@inheritDoc}
     */
    public static function i18n(): array
    {
        return [
            self::Breakfast->value => __('breakfast'),
            self::Meal->value => __('lunch_dinner'),
            self::EatClean->value => __('eat_clean'),
            self::Snacks->value => __('snacks'),
            self::Party->value => __('party'),
            self::EatWeaning->value => __('eat_weaning'),
        ];
    }

    public static function all(): array
    {
        return [
            self::Breakfast->value => [
                'title' => __('breakfast'),
                'image' => asset('images/menu_breakfast.jpg'),
                'banner' => asset('images/banner1.jpg'),
                'slug' => 'an-sang',
                'description' => 'Bắt đầu ngày mới với những món ăn sáng ngon lành và bổ dưỡng. Từ bữa sáng truyền thống với bơ, mứt và bánh mỳ nóng giòn, cho đến những món lành mạnh như smoothie trái cây, yogurt và muesli. Bạn còn có thể thưởng thức một bát bún riêu cua hay bánh cuốn thơm lừng để đầy đủ năng lượng cho một ngày tràn đầy hoạt động và sáng tạo.',
            ],
            self::Meal->value => [
                'title' => __('lunch_dinner'),
                'image' => asset('images/menu_meal.jpg'),
                'banner' => asset('images/banner1.jpg'),
                'slug' => 'an-trua-toi',
                'description' => 'Hãy khám phá thế giới đa dạng và phong phú của ẩm thực ngày nay với những món ăn trưa và ăn tối hấp dẫn. Với hàng trăm món ngon từ khắp nơi trên thế giới, bạn có thể thưởng thức những bữa ăn độc đáo và đầy hương vị.',
            ],
            self::EatClean->value => [
                'title' => __('eat_clean'),
                'image' => asset('images/menu_eat_clean.jpg'),
                'banner' => asset('images/banner1.jpg'),
                'slug' => 'an-kieng',
                'description' => 'Chào mừng bạn đến với thế giới ẩm thực healthy và kiêng khem của chúng tôi. Hãy chuẩn bị trái tim và vị giác của bạn để trải nghiệm một loạt các món ăn ngon lành và đầy chất dinh dưỡng. Với các món salad tươi mát, wrap ngũ cốc giàu chất xơ và chả cá hấp thanh đạm, chúng tôi cam kết giữ cho bạn một chế độ ăn lành mạnh và cân bằng, cung cấp sự hài lòng mà không làm hại sức khỏe. Hãy trải nghiệm một cách tuyệt vời cùng với chúng tôi!',
            ],
            self::Snacks->value => [
                'title' => __('snacks'),
                'image' => asset('images/menu_snack.jpg'),
                'banner' => asset('images/banner1.jpg'),
                'slug' => 'an-vat',
                'description' => 'Những món ăn vặt khiến bạn không thể rời mắt và miệng. Bạn có thể thưởng thức những miếng bánh mỳ sandwich tuyệt ngon, khoai tây chiên giòn rụm hoặc bánh trứng thơm phức. Ngoài ra, những miếng gà rán tẩm bột, bánh pizza và bánh mì nướng nóng hổi cũng là những lựa chọn tuyệt vời. Dù là xem phim hay gặp gỡ bạn bè, món ăn vặt sẽ tạo nên những giây phút thú vị và đáng nhớ.',
            ],
            self::Party->value => [
                'title' => __('party'),
                'image' => asset('images/menu_party.jpg'),
                'banner' => asset('images/banner1.jpg'),
                'slug' => 'an-nhau',
                'description' => 'Đắm chìm trong không khí vui tươi của những cuộc nhậu truyền thống Việt Nam với những món ăn hấp dẫn. Trổ tài với món nem nướng thơm phức, đậm đà, hay xảo ngọt cái với bánh tráng trộn mát lành. Đừng quên thưởng thức những khoảnh khắc thú vị bên nhau với món bò lúc lắc nóng hổi, đậm đà vị hành tỏi. Sự hòa quyện giữa tình bạn và đặc sản dân tộc sẽ mang đến cho bạn những trải nghiệm ngon miệng và không thể nào quên.',
            ],
            self::EatWeaning->value => [
                'title' => __('eat_weaning'),
                'image' => asset('images/menu_eat_weaning.jpg'),
                'banner' => asset('images/banner1.jpg'),
                'slug' => 'an-dam',
                'description' => 'Để bé yêu của bạn khám phá thế giới ẩm thực, hãy thử các món ăn dặm ngon lành. Cho bé thưởng thức món cháo gạo hạt sen tinh tế, hay món bột sắn dẻo thơm ngon. Bên cạnh đó, không thể thiếu đậu hũ hấp mềm mịn hay thịt băm hầm khoai tây nhuyễn. Với những món ngon này, bé sẽ phát triển một cách khỏe mạnh và đầy màu sắc.',
            ],
        ];
    }
}
